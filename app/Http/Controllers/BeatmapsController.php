<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

namespace App\Http\Controllers;

use App\Exceptions\ScoreRetrievalException;
use App\Models\Beatmap;
use App\Models\Score\Best\Model as BestModel;

/**
 * @group Beatmaps
 */
class BeatmapsController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('require-scopes:public');
    }

    public function show($id)
    {
        $beatmap = Beatmap::findOrFail($id);
        $set = $beatmap->beatmapset;

        if ($set === null) {
            abort(404);
        }

        $requestedMode = presence(request('mode'));

        if (Beatmap::isModeValid($requestedMode) && $beatmap->mode === 'osu') {
            $mode = $requestedMode;
        } else {
            $mode = $beatmap->mode;
        }

        return ujs_redirect(route('beatmapsets.show', ['beatmapset' => $set->beatmapset_id]).'#'.$mode.'/'.$id);
    }

    /**
     * Get Beatmap scores
     *
     * Returns the top scores for a beatmap
     *
     * ---
     *
     * ### Response Format
     *
     * Returns [BeatmapScores](#beatmapscores)
     *
     * @urlParam beatmap required Id of the [Beatmap](#beatmap).
     *
     * @queryParam mode The [GameMode](#gamemode) to get scores for.
     * @queryParam mods An array of matching Mods, or none // TODO.
     * @queryParam type Beatmap score ranking type // TODO.
     */
    public function scores($id)
    {
        $beatmap = Beatmap::findOrFail($id);
        if ($beatmap->approved <= 0) {
            return ['scores' => []];
        }

        $params = get_params(request()->all(), null, [
            'mode:string',
            'mods:string[]',
            'type:string',
        ]);

        $mode = presence($params['mode'] ?? null, $beatmap->mode);
        $mods = array_values(array_filter($params['mods'] ?? []));
        $type = presence($params['type'] ?? null, 'global');
        $currentUser = auth()->user();

        try {
            if ($type !== 'global' || !empty($mods)) {
                if ($currentUser === null || !$currentUser->isSupporter()) {
                    throw new ScoreRetrievalException(trans('errors.supporter_only'));
                }
            }

            $query = static::baseScoreQuery($beatmap, $mode, $mods, $type);

            if ($currentUser !== null) {
                // own score shouldn't be filtered by visibleUsers()
                $userScore = (clone $query)->where('user_id', $currentUser->user_id)->first();
            }

            $results = [
                'scores' => json_collection($query->visibleUsers()->forListing(), 'Score', ['beatmap', 'user', 'user.country', 'user.cover']),
            ];

            if (isset($userScore)) {
                // TODO: this should be moved to user_score
                $results['userScore'] = [
                    'position' => $userScore->userRank(compact('type', 'mods')),
                    'score' => json_item($userScore, 'Score', ['user', 'user.country', 'user.cover']),
                ];
            }

            return $results;
        } catch (ScoreRetrievalException $ex) {
            return error_popup($ex->getMessage());
        }
    }

    /**
     * Get a User Beatmap score
     *
     * Return a [User](#user)'s score on a Beatmap
     *
     * ---
     *
     * ### Response Format
     *
     * Returns [BeatmapUserScore](#beatmapuserscore)
     *
     * The position returned depends on the requested mode and mods.
     *
     * @urlParam beatmap required Id of the [Beatmap](#beatmap).
     * @urlParam user required Id of the [User](#user).
     *
     * @queryParam mode The [GameMode](#gamemode) to get scores for.
     * @queryParam mods An array of matching Mods, or none // TODO.
     */
    public function userScore($beatmapId, $userId)
    {
        $beatmap = Beatmap::scoreable()->findOrFail($beatmapId);

        $params = get_params(request()->all(), null, [
            'mode:string',
            'mods:string[]',
        ]);

        $mode = presence($params['mode'] ?? null, $beatmap->mode);
        $mods = array_values(array_filter($params['mods'] ?? []));

        try {
            $score = static::baseScoreQuery($beatmap, $mode, $mods)
                ->visibleUsers()
                ->where('user_id', $userId)
                ->firstOrFail();

            return [
                'position' => $score->userRank(compact('mods')),
                'score' => json_item($score, 'Score', ['beatmap', 'user', 'user.country', 'user.cover']),
            ];
        } catch (ScoreRetrievalException $ex) {
            return error_popup($ex->getMessage());
        }
    }

    private static function baseScoreQuery(Beatmap $beatmap, $mode, $mods, $type = null)
    {
        $query = BestModel::getClassByString($mode)
            ::default()
            ->where('beatmap_id', $beatmap->getKey())
            ->with(['beatmap', 'user.country', 'user.userProfileCustomization'])
            ->withMods($mods);

        if ($type !== null) {
            $query->withType($type, ['user' => auth()->user()]);
        }

        return $query;
    }
}
