<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'all_read' => 'อ่านการแจ้งเตือนทั้งหมดแล้ว!',
    'mark_read' => 'ล้าง :type',
    'none' => 'ไม่มีการแจ้งเตือนใดๆ',
    'see_all' => 'ดูการแจ้งเตือนทั้งหมด',

    'filters' => [
        '_' => 'ทั้งหมด',
        'user' => 'โปรไฟล์',
        'beatmapset' => 'บีทแมพ',
        'forum_topic' => 'บอร์ดข่าวสาร',
        'news_post' => 'ข่าวสาร',
        'build' => 'เวอร์ชั่น',
        'channel' => 'แชท',
    ],

    'item' => [
        'beatmapset' => [
            '_' => 'Beatmap',

            'beatmapset_discussion' => [
                '_' => 'พูดคุยบีทแมพ',
                'beatmapset_discussion_lock' => 'Beatmap ":title" ได้ถูกปิดการใช้งานการสนทนา',
                'beatmapset_discussion_lock_compact' => 'การสนทนาได้ถูกล็อกไว้',
                'beatmapset_discussion_post_new' => ':username ได้เขียนข้อความใหม่ใน ":title" การสนทนาของ beatmap',
                'beatmapset_discussion_post_new_empty' => 'โพสใหม่ บน :title โดย :username',
                'beatmapset_discussion_post_new_compact' => 'โพสต์ใหม่โดย :username',
                'beatmapset_discussion_post_new_compact_empty' => 'โพสใหม่โดย :username',
                'beatmapset_discussion_review_new' => 'รีวิวใหม่บน ":title" โดย :username มีปัญหาอยู่ :problems ปัญหา, คำแนะนำอยู่ :suggestions คำแนะนำ, คำชม :praises คำชม  ',
                'beatmapset_discussion_review_new_compact' => 'รีวิวโดย :username มีปัญหาอยู่ :problems ปัญหา, คำแนะนำอยู่ :suggestions คำแนะนำ, คำชม :praises คำชม  ',
                'beatmapset_discussion_unlock' => 'Beatmap ":title" ได้ถูกเปิดการใช้งานในการสนทนาแล้ว',
                'beatmapset_discussion_unlock_compact' => 'การสนทนาได้ถูกปลดล๊อค',
            ],

            'beatmapset_problem' => [
                '_' => 'ปัญหา Beatmap ที่ผ่านการรับรอง',
                'beatmapset_discussion_qualified_problem' => 'รายงานโดย :username บน :title :content',
                'beatmapset_discussion_qualified_problem_empty' => 'รายงานโดย :username บน :title ',
                'beatmapset_discussion_qualified_problem_compact' => 'รายงานโดย :username บน :content ',
                'beatmapset_discussion_qualified_problem_compact_empty' => 'รายงานโดย :username',
            ],

            'beatmapset_state' => [
                '_' => 'สถานะของบีทแมพถูกเปลี่ยน',
                'beatmapset_disqualify' => 'Beatmap ":title" ได้ถูกตัดสิทธิ์โดย :username',
                'beatmapset_disqualify_compact' => 'Beatmap ถูกตัดสิทธ์',
                'beatmapset_love' => 'Beatmap ":title" ได้ถูกเลื่อนขั้นให้เป็นที่ชื่นชอบโดย :username',
                'beatmapset_love_compact' => 'Beatmap โปรโมทเป็น Loved',
                'beatmapset_nominate' => 'Beatmap ":title" ได้ถูกเสนอชื่อโดย :username',
                'beatmapset_nominate_compact' => 'Beatmap นี้ได้รับการจัดอันดับแล้ว',
                'beatmapset_qualify' => 'Beatmap ":title" ได้มีการเสนอชื่อมากเพียงพอที่จะขึ้นการจัดอันดับแล้ว',
                'beatmapset_qualify_compact' => 'Beatmap ได้ถูกเข้าคิวมาจัดอันดับ',
                'beatmapset_rank' => '":title" ได้ถูกแรงค์แล้ว',
                'beatmapset_rank_compact' => 'Beatmap ได้รับการจัดอันดับ',
                'beatmapset_reset_nominations' => 'ปัญหานี้โพสต์โดย :username รีเซ็ทการเสนอชื่อของ beatmap ":title" ',
                'beatmapset_reset_nominations_compact' => 'การเสนอชื่อถูกรีเซ็ท',
            ],

            'comment' => [
                '_' => 'ความคิดเห็นใหม่',

                'comment_new' => ':username ได้แสดงความคิดเห็น ":content" บน ":title"',
                'comment_new_compact' => ':username ได้แสดงความคิดเห็น ":content"',
                'comment_reply' => '',
                'comment_reply_compact' => '',
            ],
        ],

        'channel' => [
            '_' => 'ห้องสนทนา',

            'channel' => [
                '_' => 'ข้อความใหม่',
                'pm' => [
                    'channel_message' => ':username พูดถึง ":title"',
                    'channel_message_compact' => ':title',
                    'channel_message_group' => 'จาก :username',
                ],
            ],
        ],

        'build' => [
            '_' => 'บันทึกการเปลี่ยนแปลง',

            'comment' => [
                '_' => 'ความคิดเห็นใหม่',

                'comment_new' => ':username ได้แสดงความคิดเห็น ":content" บน ":title"',
                'comment_new_compact' => ':username ได้แสดงความคิดเห็น ":content"',
                'comment_reply' => '',
                'comment_reply_compact' => '',
            ],
        ],

        'news_post' => [
            '_' => 'ข่าวสาร',

            'comment' => [
                '_' => 'ความคิดเห็นใหม่',

                'comment_new' => ':username ได้แสดงความคิดเห็น ":content" บน ":title"',
                'comment_new_compact' => ':username ได้แสดงความคิดเห็น ":content"',
                'comment_reply' => '',
                'comment_reply_compact' => '',
            ],
        ],

        'forum_topic' => [
            '_' => 'หัวข้อในฟอรัม',

            'forum_topic_reply' => [
                '_' => 'ตอบกลับในฟอรั่มใหม่',
                'forum_topic_reply' => ':username ได้ตอบกลับในฟอรั่ม ":title"',
                'forum_topic_reply_compact' => ':username ตอบกลับ',
            ],
        ],

        'legacy_pm' => [
            '_' => 'ฟอรั่ม PM',

            'legacy_pm' => [
                '_' => '',
                'legacy_pm' => ':count_delimited ข้อความที่ยังไม่ได้อ่าน |:count_delimited ข้อความทั้งหมดที่ยังไม่ได้อ่าน',
            ],
        ],

        'user_achievement' => [
            '_' => 'เหรียญตรา',

            'user_achievement_unlock' => [
                '_' => 'เหรียญตราใหม่',
                'user_achievement_unlock' => 'ปลดล๊อค ":title"!',
                'user_achievement_unlock_compact' => 'ปลดล๊อค ":title"!',
            ],
        ],
    ],

    'mail' => [
        'beatmapset' => [
            'beatmapset_discussion' => [
                'beatmapset_discussion_lock' => 'การพูดคุยใน ":title:" ได้ถูกล็อก',
                'beatmapset_discussion_post_new' => 'การพูดคุยใน ":title:" มีอัปเดตใหม่',
                'beatmapset_discussion_unlock' => 'การพูดคุยใน ":title:" ได้ถูกปลดล็อก',
            ],

            'beatmapset_problem' => [
                'beatmapset_discussion_qualified_problem' => 'ปัญหาใหม่ได้ถูกแจ้งใน ":title"',
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
                'comment_new' => ' บีทแมพ ":title" มีคอมเมนต์ใหม่',
            ],
        ],

        'channel' => [
            'channel' => [
                'pm' => 'คุณได้รับข้อความจาก :username',
            ],
        ],

        'build' => [
            'comment' => [
                'comment_new' => 'บันทึกการเปลี่ยนแปลง ":title" มีคอมเมนต์ใหม่',
            ],
        ],

        'news_post' => [
            'comment' => [
                'comment_new' => 'ข่าว ":title" มีคอมเมนต์ใหม่',
            ],
        ],

        'forum_topic' => [
            'forum_topic_reply' => [
                'forum_topic_reply' => 'มีการตอบกลับใหม่ใน ":title"',
            ],
        ],

        'user' => [
            'user_achievement_unlock' => [
                'user_achievement_unlock' => ':username ได้ปลดล็อกเหรียญตรา ":title"!',
                'user_achievement_unlock_self' => 'คุณได้ปลดล็อกเหรียญตรา ":title"!',
            ],
        ],
    ],
];
