<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'all_read' => 'Toate notificările citite!',
    'mark_read' => 'Curăță :type',
    'none' => 'Nicio notificare',
    'see_all' => 'vedeți toate notificările',

    'filters' => [
        '_' => 'tot',
        'user' => 'profil',
        'beatmapset' => 'beatmaps',
        'forum_topic' => 'forum',
        'news_post' => 'ştiri',
        'build' => 'construcții',
        'channel' => 'chat',
    ],

    'item' => [
        'beatmapset' => [
            '_' => 'Beatmap',

            'beatmapset_discussion' => [
                '_' => 'Discuții beatmap',
                'beatmapset_discussion_lock' => 'Discuția pe ":title" a fost închisă',
                'beatmapset_discussion_lock_compact' => 'Discuția a fost închisă',
                'beatmapset_discussion_post_new' => 'Postare nouă pe ":title" de :username',
                'beatmapset_discussion_post_new_empty' => 'Postare nouă pe ":title" de :username',
                'beatmapset_discussion_post_new_compact' => 'Postare nouă de :username',
                'beatmapset_discussion_post_new_compact_empty' => 'Postare nouă de :username',
                'beatmapset_discussion_review_new' => 'Noua recenzie ":title" de :username care conține probleme: :problems, sugestii: :suggestions, laude: :praises',
                'beatmapset_discussion_review_new_compact' => 'Noua recenzie de :username care conține probleme: :problems, sugestii: :suggestions, laude: :praises',
                'beatmapset_discussion_unlock' => 'Discuția pe ":title" a fost redeschisă',
                'beatmapset_discussion_unlock_compact' => 'Discuția a fost redeschisă',
            ],

            'beatmapset_problem' => [
                '_' => 'Problemă de beatmap calificat',
                'beatmapset_discussion_qualified_problem' => 'Raportat de :username on ":title": ":content"',
                'beatmapset_discussion_qualified_problem_empty' => 'Raportat de :username pe ":title"',
                'beatmapset_discussion_qualified_problem_compact' => 'Raportat de :username: ":content"',
                'beatmapset_discussion_qualified_problem_compact_empty' => 'Raportat de :username',
            ],

            'beatmapset_state' => [
                '_' => 'Starea Beatmap-ului s-a schimbat',
                'beatmapset_disqualify' => ':title a fost descalificat',
                'beatmapset_disqualify_compact' => 'Beatmap-ul a fost descalificat',
                'beatmapset_love' => ':title a fost promovat la loved',
                'beatmapset_love_compact' => 'Beatmap-ul a fost promovat la loved',
                'beatmapset_nominate' => ':title a fost nominat',
                'beatmapset_nominate_compact' => 'Beatmap-ul a fost nominat',
                'beatmapset_qualify' => ':title a starns destule nominații si a intrat în ranking queue',
                'beatmapset_qualify_compact' => 'Beatmap-ul a intrat în ranking queue',
                'beatmapset_rank' => ':title a fost premiat',
                'beatmapset_rank_compact' => 'Beatmap-ul a fost premiat',
                'beatmapset_reset_nominations' => 'Nominația ":title" a fost resetată',
                'beatmapset_reset_nominations_compact' => 'Nominația a fost resetată',
            ],

            'comment' => [
                '_' => 'Comentariu nou',

                'comment_new' => ':username a comentat ":content" la ":title"',
                'comment_new_compact' => ':username a comentat ":content"',
                'comment_reply' => '',
                'comment_reply_compact' => '',
            ],
        ],

        'channel' => [
            '_' => 'Conversație',

            'channel' => [
                '_' => 'Mesaj nou',
                'pm' => [
                    'channel_message' => ':username spune ":title"',
                    'channel_message_compact' => ':title',
                    'channel_message_group' => 'de la :username',
                ],
            ],
        ],

        'build' => [
            '_' => 'Istoric modificări',

            'comment' => [
                '_' => 'Comentariu nou',

                'comment_new' => ':username a comentat ":content" la ":title"',
                'comment_new_compact' => ':username a comentat ":content"',
                'comment_reply' => '',
                'comment_reply_compact' => '',
            ],
        ],

        'news_post' => [
            '_' => 'Noutăți',

            'comment' => [
                '_' => 'Comentariu nou',

                'comment_new' => ':username a comentat ":content" la ":title"',
                'comment_new_compact' => ':username a comentat ":content"',
                'comment_reply' => '',
                'comment_reply_compact' => '',
            ],
        ],

        'forum_topic' => [
            '_' => 'Subiect forum',

            'forum_topic_reply' => [
                '_' => 'Un nou răspuns pe forum',
                'forum_topic_reply' => ':username a răspuns la ":title"',
                'forum_topic_reply_compact' => ':username a răspuns',
            ],
        ],

        'legacy_pm' => [
            '_' => 'PM vechi forum',

            'legacy_pm' => [
                '_' => '',
                'legacy_pm' => ':count_delimited mesaj necitit|:count_delimited mesaje necitite',
            ],
        ],

        'user_achievement' => [
            '_' => 'Medalii',

            'user_achievement_unlock' => [
                '_' => 'Medalie nouă',
                'user_achievement_unlock' => 'Deblocat ":title"!',
                'user_achievement_unlock_compact' => 'Deblocat ":title"!',
            ],
        ],
    ],

    'mail' => [
        'beatmapset' => [
            'beatmapset_discussion' => [
                'beatmapset_discussion_lock' => '',
                'beatmapset_discussion_post_new' => '',
                'beatmapset_discussion_unlock' => '',
            ],

            'beatmapset_problem' => [
                'beatmapset_discussion_qualified_problem' => '',
            ],

            'beatmapset_state' => [
                'beatmapset_disqualify' => '',
                'beatmapset_love' => '',
                'beatmapset_nominate' => '',
                'beatmapset_qualify' => '',
                'beatmapset_rank' => '',
                'beatmapset_reset_nominations' => '',
            ],

            'comment' => [
                'comment_new' => '',
            ],
        ],

        'channel' => [
            'channel' => [
                'pm' => '',
            ],
        ],

        'build' => [
            'comment' => [
                'comment_new' => '',
            ],
        ],

        'news_post' => [
            'comment' => [
                'comment_new' => '',
            ],
        ],

        'forum_topic' => [
            'forum_topic_reply' => [
                'forum_topic_reply' => '',
            ],
        ],

        'user' => [
            'user_achievement_unlock' => [
                'user_achievement_unlock' => '',
                'user_achievement_unlock_self' => '',
            ],
        ],
    ],
];
