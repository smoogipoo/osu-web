{{--
    Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
    See the LICENCE file in the repository root for full licence text.
--}}
@extends('master', ['titlePrepend' => trans('forum.topic_watches.index.title_compact')])

@section('content')
    @include('home._user_header_default')

    <div class="osu-page osu-page--info-bar">
        <div class="grid-items">
            <div class="counter-box counter-box--info">
                <div class="counter-box__title">
                    {{ trans('forum.topic_watches.index.box.total') }}
                </div>
                <div class="counter-box__count">
                    {{ i18n_number_format($counts['total']) }}
                </div>
            </div>

            <div class="counter-box counter-box--info">
                <div class="counter-box__title">
                    {{ trans('forum.topic_watches.index.box.unread') }}
                </div>
                <div class="counter-box__count">
                    {{ i18n_number_format($counts['unread']) }}
                </div>
            </div>
        </div>
    </div>

    <div class="osu-page osu-page--forum-topic-watches-list osu-page--full">
        <div class="forum-list">
            <ul class="forum-list__items">
                @include('forum.forums._topics', [
                    'row' => 'forum.topic_watches._topic',
                    'topics' => $topics,
                ])
            </ul>
        </div>

        @include('objects._pagination_v2', ['object' => $topics, 'modifiers' => ['light-bg']])
    </div>
@endsection
