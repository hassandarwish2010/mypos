<?php

return [
    'role_structure' => [
        'suber_admin' => [
            'users' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
        ],
        'admin'=>[],

    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
