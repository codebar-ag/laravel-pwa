<?php

return [
    'name' => env('APP_NAME'),

    'manifest' => [
        'name' => env('APP_NAME'),
        'short_name' => env('APP_NAME'),
        'description' => 'Some example description.',

        'start_url' => '/',

        'background_color' => '#ffffff',
        'theme_color' => '#000000',

        'display' => 'standalone',
        'orientation' => 'any',
        'dir' => 'auto',

        'status_bar' => 'default',

        'lang' => 'en-GB',

        'icons' => [
            [
                'purpose' => 'maskable',
                'sizes' => '512x512',
                'src' => 'favicons/icon_maskable.png',
                'type' => 'image/png',
            ],
            [
                'purpose' => 'any',
                'sizes' => '512x512',
                'src' => 'favicons/icon_rounded.png',
                'type' => 'image/png',
            ],
        ],

        //        'splash' => [
        //            '640x1136' => '/splash_screens/splash-640x1136.png',
        //            '750x1334' => '/splash_screens/splash-750x1334.png',
        //            '828x1792' => '/splash_screens/splash-828x1792.png',
        //            '1125x2436' => '/splash_screens/splash-1125x2436.png',
        //            '1242x2208' => '/splash_screens/splash-1242x2208.png',
        //            '1242x2688' => '/splash_screens/splash-1242x2688.png',
        //            '1536x2048' => '/splash_screens/splash-1536x2048.png',
        //            '1668x2224' => '/splash_screens/splash-1668x2224.png',
        //            '1668x2388' => '/splash_screens/splash-1668x2388.png',
        //            '2048x2732' => '/splash_screens/splash-2048x2732.png',
        //        ],

        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    'src' => '/splash_screens/icon-72x72.png',
                    'purpose' => 'any',
                ],
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2',
            ],
        ],

        'screenshots' => [
            [
                'src' => '/screenshots/wide.png',
                'type' => 'image/png',
                'sizes' => '1920x1080',
                'form_factor' => 'wide',
                'label' => 'Wide',
            ],
            [
                'src' => '/screenshots/wide2.png',
                'type' => 'image/png',
                'sizes' => '1920x1080',
                'form_factor' => 'wide',
                'label' => 'Wide 2',
            ],
            [
                'src' => '/screenshots/1.jpg',
                'type' => 'image/png',
                'sizes' => '1080x1920',
                'label' => '1',
            ],
            [
                'src' => '/screenshots/2.jpg',
                'type' => 'image/png',
                'sizes' => '1080x1920',
                'label' => '2',
            ],
            [
                'src' => '/screenshots/3.jpg',
                'type' => 'image/png',
                'sizes' => '1080x1920',
                'label' => '3',
            ],
            [
                'src' => '/screenshots/4.jpg',
                'type' => 'image/png',
                'sizes' => '1080x1920',
                'label' => '4',
            ],
            [
                'src' => '/screenshots/5.jpg',
                'type' => 'image/png',
                'sizes' => '1080x1920',
                'label' => '5',
            ],
        ],

        'splash_screens' => [
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

        'custom' => [],
    ],

    'cache' => [
        'store' => env('CACHE_STORE', 'database'),
        'expiration' => 60,
    ],
];
