<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Sidebar Links
    |--------------------------------------------------------------------------
    |
    | Admin panel sidebar links.
    | Add links here to have them show up in the admin panel.
    | Users that do not have the listed power will not be able to
    | view the links in that section.
    |
    */

    'Admin' => [
        'power' => 'admin',
        'links' => [
            [
                'name' => 'User Ranks',
                'url' => 'admin/users/ranks'
            ]
        ]
    ],
    'Site' => [
        'power' => 'edit_pages',
        'links' => [
            [
                'name' => 'News',
                'url' => 'admin/news'
            ],
            [
                'name' => 'Pages',
                'url' => 'admin/pages'
            ]
        ]
    ],
    'Users' => [
        'power' => 'edit_user_info',
        'links' => [
            [
                'name' => 'User Index',
                'url' => 'admin/users'
            ],
            [
                'name' => 'Invitation Keys',
                'url' => 'admin/invitations'
            ],
        ]
    ],
    'Queues' => [
        'power' => 'manage_submissions',
        'links' => [
            [
                'name' => 'Prompt Submissions',
                'url' => 'admin/submissions'
            ],
            [
                'name' => 'Claim Submissions',
                'url' => 'admin/claims'
            ],
        ]
    ],
    'Grants' => [
        'power' => 'edit_inventories',
        'links' => [
            [
                'name' => 'Currency Grants',
                'url' => 'admin/grants/user-currency'
            ],
            [
                'name' => 'Item Grants',
                'url' => 'admin/grants/items'
            ],
            [
                'name' => 'Pet Grants',
                'url' => 'admin/grants/pets'
            ],
        ]
    ],
    'Masterlist' => [
        'power' => 'manage_characters',
        'links' => [
            [
                'name' => 'Create Character',
                'url' => 'admin/masterlist/create-character'
            ],
            [
                'name' => 'Create MYO Slot',
                'url' => 'admin/masterlist/create-myo'
            ],
            [
                'name' => 'Character Transfers',
                'url' => 'admin/masterlist/transfers/incoming'
            ],
            [
                'name' => 'Character Trades',
                'url' => 'admin/masterlist/trades/incoming'
            ],
            [
                'name' => 'Design Updates',
                'url' => 'admin/design-approvals/pending'
            ],
            [
                'name' => 'MYO Approvals',
                'url' => 'admin/myo-approvals/pending'
            ],
        ]
    ],
    'Data' => [
        'power' => 'edit_data',
        'links' => [
            [
                'name' => 'Character Categories',
                'url' => 'admin/data/character-categories'
            ],
            [
                'name' => 'Rarities',
                'url' => 'admin/data/rarities'
            ],
            [
                'name' => 'Species',
                'url' => 'admin/data/species'
            ],
            [
                'name' => 'Subtypes',
                'url' => 'admin/data/subtypes'
            ],
            [
                'name' => 'Traits',
                'url' => 'admin/data/traits'
            ],
            [
                'name' => 'Shops',
                'url' => 'admin/data/shops'
            ],
            [
                'name' => 'Currencies',
                'url' => 'admin/data/currencies'
            ],
            [
                'name' => 'Prompts',
                'url' => 'admin/data/prompts'
            ],
            [
                'name' => 'Loot Tables',
                'url' => 'admin/data/loot-tables'
            ],
            [
                'name' => 'Items',
                'url' => 'admin/data/items'
            ],
            [
                'name' => 'Pets',
                'url' => 'admin/data/pets'
            ],
        ]
    ],
    'Raffles' => [
        'power' => 'manage_raffles',
        'links' => [
            [
                'name' => 'Raffles',
                'url' => 'admin/raffles'
            ],
        ]
    ],
    'Settings' => [
        'power' => 'edit_site_settings',
        'links' => [
            [
                'name' => 'Site Settings',
                'url' => 'admin/settings'
            ],
            [
                'name' => 'Site Images',
                'url' => 'admin/images'
            ],
            [
                'name' => 'File Manager',
                'url' => 'admin/files'
            ],
        ]
    ],
];
