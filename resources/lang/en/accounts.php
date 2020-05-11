<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'edit' => [
        'title_compact' => 'account settings',
        'username' => 'username',

        'avatar' => [
            'title' => 'Avatar',
            'rules' => 'Please ensure your avatar adheres to :link.<br/>This means it must be <strong>suitable for all ages</strong>. i.e. no nudity, profanity or suggestive content.',
            'rules_link' => 'the community rules',
        ],

        'email' => [
            'current' => 'current email',
            'new' => 'new email',
            'new_confirmation' => 'email confirmation',
            'title' => 'Email',
        ],

        'password' => [
            'current' => 'current password',
            'new' => 'new password',
            'new_confirmation' => 'password confirmation',
            'title' => 'Password',
        ],

        'profile' => [
            'title' => 'Profile',

            'user' => [
                'user_discord' => 'discord',
                'user_from' => 'current location',
                'user_interests' => 'interests',
                'user_msnm' => 'skype',
                'user_occ' => 'occupation',
                'user_twitter' => 'twitter',
                'user_website' => 'website',
            ],
        ],

        'signature' => [
            'title' => 'Signature',
            'update' => 'update',
        ],
    ],

    'notifications' => [
        'title' => 'Notifications',
        'topic_auto_subscribe' => 'automatically enable notifications on new forum topics that you create',
        'beatmapset_discussion_qualified_problem' => 'receive notifications for new problem on qualified beatmaps of following modes',

        'mail' => [
            '_' => 'receive mail notifications for',
            'beatmapset:modding' => 'beatmap modding',
            'forum_topic_reply' => 'topic reply',
        ],
    ],

    'oauth' => [
        'authorized_clients' => 'authorized clients',
        'own_clients' => 'own clients',
        'title' => 'OAuth',
    ],

    'options' => [
        'title' => 'Options',

        'beatmapset_download' => [
            '_' => 'default beatmap download type',
            'all' => 'with video if available',
            'no_video' => 'without video',
            'direct' => 'open in osu!direct',
        ],
    ],

    'playstyles' => [
        'keyboard' => 'keyboard',
        'mouse' => 'mouse',
        'tablet' => 'tablet',
        'title' => 'Playstyles',
        'touch' => 'touch',
    ],

    'privacy' => [
        'friends_only' => 'block private messages from people not on your friends list',
        'hide_online' => 'hide your online presence',
        'title' => 'Privacy',
    ],

    'security' => [
        'current_session' => 'current',
        'end_session' => 'End Session',
        'end_session_confirmation' => 'This will immediately end your session on that device. Are you sure?',
        'last_active' => 'Last active:',
        'title' => 'Security',
        'web_sessions' => 'web sessions',
    ],

    'update_email' => [
        'update' => 'update',
    ],

    'update_password' => [
        'update' => 'update',
    ],

    'verification_completed' => [
        'text' => 'You can close this tab/window now',
        'title' => 'Verification has been completed',
    ],

    'verification_invalid' => [
        'title' => 'Invalid or expired verification link',
    ],
];
