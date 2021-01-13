<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'availability' => [
        'disabled' => '이 비트맵은 현재 다운로드할 수 없습니다.',
        'parts-removed' => '이 비트맵의 일부가 콘텐츠 제작자 또는 제삼자 권리자의 저작권 주장으로 인해 삭제되었습니다.',
        'more-info' => '더 많은 정보를 보려면 여기를 확인하세요.',
        'rule_violation' => '',
    ],

    'index' => [
        'title' => '비트맵 목록',
        'guest_title' => '비트맵',
    ],

    'panel' => [
        'empty' => '',

        'download' => [
            'all' => '다운로드',
            'video' => '영상 포함된 것으로 받기',
            'no_video' => '영상 없는 것으로 받기',
            'direct' => 'osu!direct에서 열기',
        ],
    ],

    'nominate' => [
        'hybrid_requires_modes' => '',
        'incorrect_mode' => '',
        'full_bn_required' => '',
        'too_many' => '',

        'dialog' => [
            'confirmation' => '',
            'header' => '',
            'hybrid_warning' => '',
            'which_modes' => '',
        ],
    ],

    'show' => [
        'discussion' => '토론',

        'details' => [
            'favourite' => '즐겨찾기',
            'logged-out' => '로그인 후 비트맵을 다운로드하세요!',
            'mapped_by' => ':mapper님의 맵',
            'unfavourite' => '즐겨찾기 해제',
            'updated_timeago' => ':timeago에 마지막으로 수정됨',

            'download' => [
                '_' => '다운로드',
                'direct' => 'osu!다이렉트',
                'no-video' => '영상 미포함',
                'video' => '영상 포함',
            ],

            'login_required' => [
                'bottom' => '하여 더 많은 기능 사용',
                'top' => '로그인',
            ],
        ],

        'details_date' => [
            'approved' => ':timeago 전 approved 됨',
            'loved' => ':timeago 전 loved 됨',
            'qualified' => ':timeago 전 qualified 됨',
            'ranked' => ':timeago ranked 됨',
            'submitted' => ':timeago 제출됨',
            'updated' => ':timeago 마지막으로 수정됨',
        ],

        'favourites' => [
            'limit_reached' => '즐겨찾기 한 비트맵이 너무 많습니다! 계속하기 전에 즐겨찾기 수를 줄여주세요.',
        ],

        'hype' => [
            'action' => '이 맵이 마음에 드신다면 <strong>Ranked</strong> 상태가 될 수 있도록 도움을 주게 Hype 해주세요.',

            'current' => [
                '_' => '이 맵은 현재 :status 상태입니다.',

                'status' => [
                    'pending' => '보류',
                    'qualified' => 'qualified',
                    'wip' => '제작 중',
                ],
            ],

            'disqualify' => [
                '_' => '이 비트맵에 문제가 있다면, :link해 주세요.',
            ],

            'report' => [
                '_' => '이 비트맵에 문제가 있다면 :link에서 저희에게 신고해 주세요.',
                'button' => '문제 보고',
                'link' => '여기',
            ],
        ],

        'info' => [
            'description' => '설명',
            'genre' => '장르',
            'language' => '언어',
            'no_scores' => '데이터를 수집중입니다...',
            'points-of-failure' => '실패 지점',
            'source' => '원작',
            'success-rate' => '클리어 비율',
            'tags' => '태그',
        ],

        'scoreboard' => [
            'achieved' => ':when에 달성함',
            'country' => '국가 순위',
            'friend' => '친구 순위',
            'global' => '전체 순위',
            'supporter-link' => '서포터로서 누릴 수 있는 다른 멋진 기능들을 확인하려면 <a href=":link">여기</a>를 클릭해주세요!',
            'supporter-only' => '서포터가 되어야 국가 및 친구 간 순위를 확인할 수 있습니다!',
            'title' => '점수판',

            'headers' => [
                'accuracy' => '정확도',
                'combo' => '최대 콤보',
                'miss' => 'Miss',
                'mods' => '모드',
                'player' => '플레이어',
                'pp' => '',
                'rank' => '순위',
                'score_total' => '총 점수',
                'score' => '점수',
                'time' => '시간',
            ],

            'no_scores' => [
                'country' => '아직 소속 국가에서 점수를 기록한 사람이 없습니다!',
                'friend' => '아직 친구들 중 점수를 기록한 사람이 없습니다!',
                'global' => '아직 기록된 점수가 없네요. 한 번 기록해보시는 건 어때요?',
                'loading' => '점수 불러오는 중...',
                'unranked' => '랭크되지 않은 비트맵입니다.',
            ],
            'score' => [
                'first' => '순위권',
                'own' => '내 최고 점수',
            ],
        ],

        'stats' => [
            'cs' => 'Circle Size',
            'cs-mania' => '키 개수',
            'drain' => 'HP Drain',
            'accuracy' => 'Accuracy',
            'ar' => 'Approach Rate',
            'stars' => 'Star Difficulty',
            'total_length' => '길이',
            'bpm' => 'BPM',
            'count_circles' => 'Circle Count',
            'count_sliders' => 'Slider Count',
            'user-rating' => '유저 평점',
            'rating-spread' => '평점 분포도',
            'nominations' => '추천',
            'playcount' => '플레이 횟수',
        ],

        'status' => [
            'ranked' => 'Ranked',
            'approved' => 'Approved',
            'loved' => 'Loved',
            'qualified' => 'Qualified',
            'wip' => '제작 중',
            'pending' => 'Pending',
            'graveyard' => '무덤에 감',
        ],
    ],
];
