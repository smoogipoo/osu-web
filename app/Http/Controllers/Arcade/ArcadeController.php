<?php

namespace App\Http\Controllers\Arcade;

use App\Http\Controllers\Controller;
use DB;

class ArcadeController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth', ['except' => ['leaderboard']]);
    }

    public function leaderboard()
    {
        $events = DB::table('matchmaking_room_events')
            ->where('event_type', 'arcade_victory')
            ->selectRaw("event_detail->>'$.user_id' as user_id, event_detail->>'$.username' as username")
            ->get();

        return $events
            ->groupBy('user_id')
            ->map(function ($group) {
                $first = $group->first();

                return [
                    'user_id' => (int)$first->user_id,
                    'username' => $first->username,
                    'victories' => $group->count()
                ];
            })
            ->values();
    }
}
