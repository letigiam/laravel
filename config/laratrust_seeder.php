<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        // 'superadministrator' => [
        //     'users' => 'c,r,u,d',
        //     'payments' => 'c,r,u,d',
        //     'profile' => 'r,u'
        // ],
        'administrator' => [
            'company' => 'c,r,u,d', //crea l'azienda
            'district' => 'c,r,u,d',
            'user' => 'c,r,u,d', //crea le credenziali dell'utente appartenente all'azienda
        ],
        'user' => [
            'company' => 'r,u',
            'user' => 'r,u'
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
