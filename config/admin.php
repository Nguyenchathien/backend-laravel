<?php

return [

    /*
     * Backend-laravel name.
     */
    'name'      => 'Backend-laravel',

    /*
     * Logo in admin panel header.
     */
    'logo'      => '<b>Laravel</b> admin',

    /*
     * Mini-logo in admin panel header.
     */
    'logo-mini' => '<b>Fun</b>',

    /*
     * Backend-laravel url prefix.
     */
    'prefix'    => 'admin',

    /*
     * Backend-laravel install directory.
     */
    'directory' => app_path('Admin'),

    /*
     * Backend-laravel html title.
     */
    'title'  => 'Admin',

    /*
     * Backend-laravel auth setting.
     */
    'auth' => [
        'driver'   => 'session',
        'provider' => '',
        'model'    => CODE4FUN\Admin\Auth\Database\Administrator::class,
    ],

    /*
     * Backend-laravel upload setting.
     */
    'upload'  => [

        'disk' => 'admin',

        'directory'  => [
            'image'  => 'image',
            'file'   => 'file',
        ],

        'host' => 'http://code4fun.biz/',
    ],

    /*
     * Backend-laravel database setting.
     */
    'database' => [

        // Database connection for following tables.
        'connection'  => '',

        // User tables and model.
        'users_table' => 'admin_users',
        'users_model' => CODE4FUN\Admin\Auth\Database\Administrator::class,

        // Role table and model.
        'roles_table' => 'admin_roles',
        'roles_model' => CODE4FUN\Admin\Auth\Database\Role::class,

        // Permission table and model.
        'permissions_table' => 'admin_permissions',
        'permissions_model' => CODE4FUN\Admin\Auth\Database\Permission::class,

        // Menu table and model.
        'menu_table'  => 'admin_menu',
        'menu_model'  => CODE4FUN\Admin\Auth\Database\Menu::class,

        // Pivot table for table above.
        'operation_log_table'    => 'admin_operation_log',
        'user_permissions_table' => 'admin_user_permissions',
        'role_users_table'       => 'admin_role_users',
        'role_permissions_table' => 'admin_role_permissions',
        'role_menu_table'        => 'admin_role_menu',
    ],

    /*
     * By setting this option to open or close operation log in laravel-admin.
     */
    'operation_log'   => true,

    /*
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
     */
    'skin'    => 'skin-black',

    /*
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
     */
    'layout'  => ['fixed'],

    /*
     * Version displayed in footer.
     */
    'version'   => '1.0',
];
