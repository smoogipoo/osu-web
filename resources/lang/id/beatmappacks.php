<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'index' => [
        'description' => 'Paket beatmap yang telah disusun atas satu tema tertentu.',
        'nav_title' => 'daftar',
        'title' => 'Paket Beatmap',

        'blurb' => [
            'important' => 'BACA INI SEBELUM MENGUNDUH',
            'instruction' => [
                '_' => "Petunjuk Pemasangan: Setelah paket beatmap selesai diunduh, ekstrak file .rar yang tersedia ke dalam folder Songs pada direktori osu! Anda.
                    Seluruh beatmap yang terkandung di dalam paket yang Anda unduh telah disediakan dalam bentuk .zip dan/atau .osz, di mana osu! akan kemudian memproses berkas-berkas yang terkait dengan sendirinya ketika Anda masuk ke dalam mode Play.
                    :scary ekstrak .zip/.osz yang ada secara manual,
                    karena ada kemungkinan berkas-berkas beatmap yang bersangkutan nantinya tidak akan dapat dimuat oleh osu! dan dimainkan sebagaimana semestinya.",
                'scary' => 'JANGAN',
            ],
            'note' => [
                '_' => 'Mohon diingat bahwa sangat disarankan bagi Anda untuk :scary, mengingat map-map yang terdahulu (lebih lama) pada umumnya cenderung memiliki kualitas yang jauh lebih rendah dibanding map-map terbaru.',
                'scary' => 'mengunduh paket dari yang terbaru ke yang paling lama',
            ],
        ],
    ],

    'show' => [
        'download' => 'Unduh',
        'item' => [
            'cleared' => 'telah dimainkan',
            'not_cleared' => 'belum dimainkan',
        ],
    ],

    'mode' => [
        'artist' => 'Artis/Album',
        'chart' => 'Spotlights',
        'standard' => 'Standar',
        'theme' => 'Tematik',
    ],

    'require_login' => [
        '_' => 'Anda harus :link untuk mengunduh',
        'link_text' => 'masuk',
    ],
];
