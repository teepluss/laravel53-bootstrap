<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Config web route permissions.
    |--------------------------------------------------------------------------
    |
    | Website permission
    |
    */

    'web' => [
        'post' => [
            'name' => 'Post',
            'description' => 'Post permissions',
            'perms' => [
                [
                    'uses' => 'post-view',
                    'explain' => 'Allow to view post(s) on web'
                ],
                [
                    'uses' => 'post-create',
                    'explain' => 'Allow to create a post on web'
                ],
                [
                    'uses' => 'post-update',
                    'explain' => 'Allow to update a post on web'
                ],
                [
                    'uses' => 'post-delete',
                    'explain' => 'Allow to delete a post on web'
                ]
            ]
        ],
        // another module
    ],

    /*
    |--------------------------------------------------------------------------
    | Config cms route permissions.
    |--------------------------------------------------------------------------
    |
    | CMS permission
    |
    */

    'cms' => [
        'post' => [
            'name' => 'Photo',
            'description' => 'Photo permissions',
            'perms' => [
                [
                    'uses' => 'post-viewable',
                    'explain' => 'Allow to view post(s) on CMS'
                ],
                [
                    'uses' => 'post-writable',
                    'explain' => 'Allow to create a post on CMS'
                ],
                [
                    'uses' => 'post-deletable',
                    'explain' => 'Allow to update a post on CMS'
                ],
                [
                    'uses' => 'post-approvable',
                    'explain' => 'Allow to approve a post on CMS'
                ]
            ]
        ],
        // another module
    ],

    /*
    |--------------------------------------------------------------------------
    | Config api route permissions.
    |--------------------------------------------------------------------------
    |
    | API permission
    |
    */

    'api' => []
];


