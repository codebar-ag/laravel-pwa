<?php

return [
    'name' => env('APP_NAME'),

    'manifest' => [
        'name' => env('APP_NAME'),
        'short_name' => env('APP_NAME'),

        'start_url' => '/',

        'background_color' => '#ffffff',
        'theme_color' => '#000000',

        'display' => 'standalone',
        'orientation' => 'any',

        'status_bar' => 'default',

        'icons' => [
            '72x72' => [
                'path' => '/favicons/icon-72x72.png',
                'purpose' => 'any',
            ],
            '96x96' => [
                'path' => '/favicons/icon-96x96.png',
                'purpose' => 'any',
            ],
            '128x128' => [
                'path' => '/favicons/icon-128x128.png',
                'purpose' => 'any',
            ],
            '144x144' => [
                'path' => '/favicons/icon-144x144.png',
                'purpose' => 'any',
            ],
            '152x152' => [
                'path' => '/favicons/icon-152x152.png',
                'purpose' => 'any',
            ],
            '192x192' => [
                'path' => '/favicons/icon-192x192.png',
                'purpose' => 'any',
            ],
            '512x512' => [
                'path' => '/favicons/icon-192x192.png',
                'purpose' => 'any',
            ],
        ],

        'splash' => [
            '640x1136' => '/splash_screens/splash-640x1136.png',
            '750x1334' => '/splash_screens/splash-750x1334.png',
            '828x1792' => '/splash_screens/splash-828x1792.png',
            '1125x2436' => '/splash_screens/splash-1125x2436.png',
            '1242x2208' => '/splash_screens/splash-1242x2208.png',
            '1242x2688' => '/splash_screens/splash-1242x2688.png',
            '1536x2048' => '/splash_screens/splash-1536x2048.png',
            '1668x2224' => '/splash_screens/splash-1668x2224.png',
            '1668x2388' => '/splash_screens/splash-1668x2388.png',
            '2048x2732' => '/splash_screens/splash-2048x2732.png',
        ],

        //        'shortcuts' => [
        //            [
        //                'name' => 'Shortcut Link 1',
        //                'description' => 'Shortcut Link 1 Description',
        //                'url' => '/shortcutlink1',
        //                'icons' => [
        //                    'src' => '/splash_screens/icon-72x72.png',
        //                    'purpose' => 'any',
        //                ],
        //            ],
        //            [
        //                'name' => 'Shortcut Link 2',
        //                'description' => 'Shortcut Link 2 Description',
        //                'url' => '/shortcutlink2',
        //            ],
        //        ],

        'custom' => [],
    ],

    'cache' => [
        'store' => env('CACHE_STORE', 'database'),
        'expiration' => 60,
    ],

    'tenant' => [
        'enabled' => true,

        'model' => \App\Models\Team::class,

        'cache' => [
            'store' => env('CACHE_STORE', 'database'),
            'expiration' => 60,
        ],
    ],
];
