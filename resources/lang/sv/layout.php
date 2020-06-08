<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'audio' => [
        'autoplay' => '',
    ],

    'defaults' => [
        'page_description' => 'osu! - Rytmen är bara ett *klick* bort!  Med Ouendan/EBA, Taiko och originala spel lägen, och en full funktionell nivå redigerare.',
    ],

    'header' => [
        'admin' => [
            'beatmapset' => 'beatmapset',
            'beatmapset_covers' => 'beatmapset omslag',
            'contest' => 'tävling',
            'contests' => 'tävlingar',
            'root' => 'konsol',
            'store_orders' => 'butik admin',
        ],

        'artists' => [
            'index' => 'listning',
        ],

        'changelog' => [
            'index' => 'listning',
        ],

        'help' => [
            'index' => 'index',
            'sitemap' => 'Sitemap',
        ],

        'store' => [
            'cart' => 'varukorg',
            'orders' => 'orderhistorik',
            'products' => 'produkter',
        ],

        'tournaments' => [
            'index' => 'listning',
        ],

        'users' => [
            'modding' => 'modding',
            'show' => 'info',
        ],
    ],

    'gallery' => [
        'close' => 'Stäng (Esc)',
        'fullscreen' => 'Växla fullskärm',
        'zoom' => 'Zooma in/ut',
        'previous' => 'Föregående (vänsterpil)',
        'next' => 'Nästa (högerpil)',
    ],

    'menu' => [
        'beatmaps' => [
            '_' => 'beatmaps',
            'artists' => 'utvalda artister',
            'index' => 'listning',
            'packs' => 'samling',
        ],
        'community' => [
            '_' => 'gemenskap',
            'chat' => 'chatt',
            'contests' => 'tävlingar',
            'dev' => 'utveckling',
            'forum-forums-index' => 'forum',
            'getLive' => 'live',
            'tournaments' => 'turneringar',
        ],
        'help' => [
            '_' => 'hjälp',
            'getFaq' => 'faq',
            'getRules' => 'regler',
            'getSupport' => 'support',
            'getWiki' => 'wiki',
        ],
        'home' => [
            '_' => 'hem',
            'changelog-index' => 'ändringslogg',
            'getDownload' => 'ladda ner',
            'news-index' => 'nyheter',
            'search' => 'sök',
            'team' => 'lag',
        ],
        'rankings' => [
            '_' => 'rankning',
            'charts' => 'diagram',
            'country' => 'land',
            'index' => 'prestanda',
            'kudosu' => 'kudosu',
            'score' => 'poäng',
        ],
        'store' => [
            '_' => 'butik',
            'cart-show' => 'varukorg
',
            'getListing' => 'listning',
            'orders-index' => 'orderhistorik',
        ],
    ],

    'footer' => [
        'general' => [
            '_' => 'Allmänt',
            'home' => 'Hem',
            'changelog-index' => 'Ändringslogg',
            'beatmaps' => 'Beatmap Listningar',
            'download' => 'Ladda Ner osu!',
        ],
        'help' => [
            '_' => 'Hjälp & Gemenskap',
            'faq' => 'Vanliga Frågor',
            'forum' => 'GemenskapsForum',
            'livestreams' => 'Live Strömmar',
            'report' => 'Rapportera ett Problem',
            'wiki' => 'Wiki',
        ],
        'legal' => [
            '_' => 'Juridik & Status',
            'copyright' => 'Copyright (DMCA)',
            'privacy' => 'Sekretess',
            'server_status' => 'Server Status',
            'source_code' => 'Källkod',
            'terms' => 'Användarvillkor',
        ],
    ],

    'errors' => [
        '400' => [
            'error' => 'Ogiltiga förfrågningsparametrar',
            'description' => '',
        ],
        '404' => [
            'error' => 'Sida saknas',
            'description' => "Förlåt, men sidan du frågade efter finns inte här!",
        ],
        '403' => [
            'error' => "Du bör inte vara här",
            'description' => 'Du kan däremot försöka gå tillbaka.',
        ],
        '401' => [
            'error' => "Du bör inte vara här",
            'description' => 'Du kan däremot försöka gå tillbaka. Eller kanske logga in.',
        ],
        '405' => [
            'error' => 'Sida saknas',
            'description' => "Förlåt, men sidan du frågade efter finns inte här!",
        ],
        '422' => [
            'error' => 'Ogiltiga förfrågningsparametrar',
            'description' => '',
        ],
        '500' => [
            'error' => 'Oh nej! Något gick isönder! ;_;',
            'description' => "Vi blir automatiskt notifierade av varje fel",
        ],
        'fatal' => [
            'error' => 'Oh nej! Något gick verkligen isönder! ;_;',
            'description' => "Vi blir automatiskt notifierade av varje fel",
        ],
        '503' => [
            'error' => 'Nere för underhåll!',
            'description' => "Underhåll brukar oftast ta från 5 sekunder till 10 minuter. Om vi är nere längre, se :link för mer information.",
            'link' => [
                'text' => '@osustatus',
                'href' => 'https://twitter.com/osustatus',
            ],
        ],
        // used by sentry if it returns an error
        'reference' => "Bara ifall att, här är en kod du kan ge till support!",
    ],

    'popup_login' => [
        'login' => [
            'forgot' => "Jag har glömt mina detaljer",
            'password' => 'lösenord',
            'title' => 'Logga In För Att Fortsätta',
            'username' => 'användarnamn',

            'error' => [
                'email' => "Användarnamn eller email adress finns inte",
                'password' => 'Inkorrekt lösenord',
            ],
        ],

        'register' => [
            'download' => 'Ladda ner',
            'info' => 'Herrn, du behöver ett konto. Varför har du inte ett redan?',
            'title' => "Har du inte ett konto?",
        ],
    ],

    'popup_user' => [
        'links' => [
            'account-edit' => 'Inställningar',
            'friends' => 'Vänner',
            'logout' => 'Logga Ut',
            'profile' => 'Min Profil',
        ],
    ],

    'popup_search' => [
        'initial' => 'Skriv för att söka!',
        'retry' => 'Sökning misslyckades. Klicka för att försöka igen.',
    ],
];
