<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'event' => [
        'approve' => 'Одобрена.',
        'discussion_delete' => 'Модератор видалив відгук в :discussion.',
        'discussion_lock' => 'Обговорення цієї карти було відключено. (:text)',
        'discussion_post_delete' => 'Модератор вилучив публікацію з відгуку :discussion.',
        'discussion_post_restore' => 'Модератор відновив публікацію з відгуку :discussion.',
        'discussion_restore' => 'Модератор відновив відгук в :discussion.',
        'discussion_unlock' => 'Обговорення цієї карти відключено.',
        'disqualify' => 'Дискваліфіковано :user. Причина: :discussion (:text).',
        'disqualify_legacy' => 'Дискваліфіковано :user. Причина: :text.',
        'issue_reopen' => 'Проблема в :discussion знову вирішена.',
        'issue_resolve' => 'Проблема :discussion відмічена як вирішена.',
        'kudosu_allow' => 'Кудосу з відгуку :discussion були вилучені.',
        'kudosu_deny' => 'Відгуку :discussion відмовлено в отриманні кудосу.',
        'kudosu_gain' => 'Відгук в :discussion від :user отримав достатньо голосів для отримання кудосу.',
        'kudosu_lost' => 'Відгук в :discussion від :user втратило голоси і присуджені кудосу були вилучені.',
        'kudosu_recalculate' => 'Кудосу за відгук в :discussion були перераховані.',
        'love' => 'Додано :user в улюблене',
        'nominate' => 'Номіновано :user.',
        'nomination_reset' => 'Через нову проблему в :discussion (:text) статус номінації був скинутий.',
        'qualify' => 'Ця карта була номінована достатню кількість разів для кваліфікації.',
        'rank' => 'Рейтинговий.',
    ],

    'index' => [
        'title' => 'Події карти',

        'form' => [
            'period' => 'Період',
            'types' => 'Типи',
        ],
    ],

    'item' => [
        'content' => 'Контент',
        'discussion_deleted' => '[deleted]',
        'type' => 'Тип',
    ],

    'type' => [
        'approve' => 'Одобрено',
        'discussion_delete' => 'Видалення дискусії',
        'discussion_post_delete' => 'Видалення відповідей в дискусії',
        'discussion_post_restore' => 'Відновлення відповідей в дискусії',
        'discussion_restore' => 'Відновлення дискусії',
        'disqualify' => 'Дискваліфікація',
        'issue_reopen' => 'Відновлення обговорення',
        'issue_resolve' => 'Обговорення вирішення',
        'kudosu_allow' => 'Ліміт кудосу',
        'kudosu_deny' => 'Відмова в кудосу',
        'kudosu_gain' => 'Отримання кудосу',
        'kudosu_lost' => 'Втрата кудосу',
        'kudosu_recalculate' => 'Перерахунок кудосу',
        'love' => 'Любов',
        'nominate' => 'Номінація',
        'nomination_reset' => 'Скинути номінацію',
        'qualify' => 'Кваліфікація',
        'rank' => 'Рейтинг',
    ],
];
