{{--
    Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
    See the LICENCE file in the repository root for full licence text.
--}}
{!! trans('mail.common.hello', ['user' => $user->username]) !!}

{!! trans('mail.beatmapset_update_notice.new', ['title' => $beatmapset->title]) !!}

{!! trans('mail.beatmapset_update_notice.visit') !!}
{!! route('beatmapsets.discussion', $beatmapset) !!}

{!! trans('mail.beatmapset_update_notice.unwatch') !!}
{!! route('beatmapsets.watches.index') !!}

@include('emails._signature')
