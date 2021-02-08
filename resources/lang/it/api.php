<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'error' => [
        'chat' => [
            'empty' => 'Non puoi inviare messaggi vuoti.',
            'limit_exceeded' => 'Stai inviando messaggi troppo velocemente, per favore aspetta un po\' prima di riprovare.',
            'too_long' => 'Il messaggio che vuoi inviare è troppo lungo.',
        ],
    ],

    'scopes' => [
        'bot' => '',
        'identify' => 'Identificarti e leggere il tuo profilo pubblico.',

        'chat' => [
            'write' => '',
        ],

        'friends' => [
            'read' => 'Vedere chi stai seguendo.',
        ],

        'public' => 'Leggere dati pubblici a nome tuo.',
    ],
];
