<?php

return [


    'defaults' => [
        'guard' => 'web',
        'passwords' => 'volunteers',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'volunteers',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'volunteers',
            'hash' => false,
        ],
    ],

    'providers' => [
        'volunteers' => [
            'driver' => 'sanctum',
            'model' => App\Models\Volunteer::class,
        ],
        'admins' => [
            'driver' => 'sanctum',
            'model' => App\Models\Admin::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    'passwords' => [
        'volunteers' => [
            'provider' => 'volunteers',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
