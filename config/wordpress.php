<?php

return [
    'core'  => storage_path('/wordpress'),
    'debug' => env('APP_DEBUG'),
    'theme' => [
        'views' => 'views',
        'option_key' => 'theme_mods_'.env('APP_NAME'),
    ],
    'url'   => [
        'backend'        => rtrim(env('APP_BACKEND_URL'), '/'),
        'site'           => rtrim(env('APP_URL'), '/'),
        'backend_prefix' => trim(parse_url(env('APP_BACKEND_URL'), PHP_URL_PATH), '/').'/',
        'site_prefix'    => trim(parse_url(env('APP_URL'), PHP_URL_PATH), '/').'/',
    ],

    'auth' => [
        'key'      => env('WP_AUTH_KEY'),
        'salt'     => env('WP_AUTH_SALT'),
        'secure'   => [
            'key'  => env('WP_SECURE_AUTH_KEY'),
            'salt' => env('WP_SECURE_AUTH_SALT'),
        ],
        'loggedIn' => [
            'key'  => env('WP_LOGGED_IN_KEY'),
            'salt' => env('WP_LOGGED_IN_SALT'),
        ],
    ],

    'noce' => [
        'key'  => env('WP_NONCE_KEY'),
        'salt' => env('WP_NONCE_SALT'),
    ],

    'images' => [
        'quality' => 95,
        'sizes'   => [
//            'thumb' => [
//                'width'  => 70,
//                'height' => 70,
//                'crop'   => true,
//            ],
        ],
    ],

    'menus' => [
        'primary',
        'footer',
    ],

    'posts' => [
        'per_page'    => 10,
        'on_homepage' => 10,
        'map'         => [
            'page'    => \LaPress\Models\Page::class,
            'post'    => \LaPress\Models\Post::class,
        ],
        /*
        |--------------------------------------------------------------------------
        | Custom post types
        |--------------------------------------------------------------------------
        | Provide custom post types models
        | You can define class name or an array with model and options key
        |
        */
        'types'       => [],
        /*
        |--------------------------------------------------------------------------
        | Custom post types taxonomies
        |--------------------------------------------------------------------------
        |
        */
        'taxonomies'  => [
//            '{postType}'     => [
//                '{taxonomy}'      => [],
//            ],
        ],
    ],
];