<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Module Namespace
    |--------------------------------------------------------------------------
    |
    | Default module namespace.
    |
    */

    'namespace' => 'Modules',

    /*
    |--------------------------------------------------------------------------
    | Module Stubs
    |--------------------------------------------------------------------------
    |
    | Default module stubs.
    |
    */

    'stubs' => [
        'enabled' => false,
        'path' => base_path() . '/vendor/ansezz/laravel-vuejs-modules/src/Commands/stubs',
        'files' => [
            'start' => 'start.php',
            'routes' => 'Routes/routes.php',
            'views/index' => 'Resources/views/index.blade.php',
            'views/master' => 'Resources/views/layouts/master.blade.php',

            'vueapp/App' => 'vueapp/App.vue',
            'vueapp/.eslintrc' => 'vueapp/.eslintrc.js',
            'vueapp/i18n/index' => 'vueapp/i18n/index.js',
            'vueapp/i18n/en/index' => 'vueapp/i18n/en/index.js',
            'vueapp/router/routes' => 'vueapp/router/routes.js',
            'vueapp/store/actions' => 'vueapp/store/actions.js',
            'vueapp/store/getters' => 'vueapp/store/getters.js',
            'vueapp/store/index' => 'vueapp/store/index.js',
            'vueapp/store/mutations' => 'vueapp/store/mutations.js',
            'vueapp/store/state' => 'vueapp/store/state.js',
            'vueapp/layouts/default' => 'vueapp/layouts/default.vue',
            'vueapp/pages/404' => 'vueapp/pages/404.vue',
            'vueapp/pages/index' => 'vueapp/pages/index.vue',


            /*'vueapp/assets' => 'vueapp/assets',
            'vueapp/components' => 'vueapp/components',
            'vueapp/css' => 'vueapp/css',
            'vueapp/i18n' => 'vueapp/i18n',
            'vueapp/layouts' => 'vueapp/layouts',
            'vueapp/pages' => 'vueapp/pages',
            'vueapp/plugins' => 'vueapp/plugins',
            'vueapp/router' => 'vueapp/router',
            'vueapp/statics' => 'vueapp/statics',
            'vueapp/store' => 'vueapp/store',*/

            'scaffold/config' => 'Config/config.php',
            'composer' => 'composer.json',
        ],
        'replacements' => [
            'start' => ['LOWER_NAME', 'ROUTES_LOCATION'],
            'routes' => ['LOWER_NAME', 'STUDLY_NAME', 'MODULE_NAMESPACE'],
            'json' => ['LOWER_NAME', 'STUDLY_NAME', 'MODULE_NAMESPACE'],
            'views/index' => ['LOWER_NAME'],
            'views/master' => ['STUDLY_NAME'],

            'vueapp/.eslintrc' => ['LOWER_NAME', 'STUDLY_NAME'],
            'vueapp/i18n/index' => ['LOWER_NAME', 'STUDLY_NAME'],
            'vueapp/i18n/en/index' => ['LOWER_NAME', 'STUDLY_NAME'],
            'vueapp/layouts/default' => ['LOWER_NAME', 'STUDLY_NAME'],
            'vueapp/pages/404' => ['LOWER_NAME', 'STUDLY_NAME'],
            'vueapp/pages/index' => ['LOWER_NAME', 'STUDLY_NAME'],
            'vueapp/router/routes' => ['LOWER_NAME', 'STUDLY_NAME'],
            'vueapp/store/actions' => ['LOWER_NAME', 'STUDLY_NAME'],
            'vueapp/store/getters' => ['LOWER_NAME', 'STUDLY_NAME'],
            'vueapp/store/index' => ['LOWER_NAME', 'STUDLY_NAME'],
            'vueapp/store/mutations' => ['LOWER_NAME', 'STUDLY_NAME'],
            'vueapp/store/state' => ['LOWER_NAME', 'STUDLY_NAME'],


            'scaffold/config' => ['STUDLY_NAME'],
            'composer' => [
                'LOWER_NAME',
                'STUDLY_NAME',
                'VENDOR',
                'AUTHOR_NAME',
                'AUTHOR_EMAIL',
                'MODULE_NAMESPACE',
            ],
        ],
        'gitkeep' => true,
    ],
    'paths' => [
        /*
        |--------------------------------------------------------------------------
        | Modules path
        |--------------------------------------------------------------------------
        |
        | This path used for save the generated module. This path also will be added
        | automatically to list of scanned folders.
        |
        */

        'modules' => base_path('Modules'),
        /*
        |--------------------------------------------------------------------------
        | Modules assets path
        |--------------------------------------------------------------------------
        |
        | Here you may update the modules assets path.
        |
        */

        'assets' => public_path('modules'),
        /*
        |--------------------------------------------------------------------------
        | The migrations path
        |--------------------------------------------------------------------------
        |
        | Where you run 'module:publish-migration' command, where do you publish the
        | the migration files?
        |
        */

        'migration' => base_path('database/migrations'),
        /*
        |--------------------------------------------------------------------------
        | Generator path
        |--------------------------------------------------------------------------
        | Customise the paths where the folders will be generated.
        | Set the generate key to false to not generate that folder
        */
        'generator' => [
            'config' => ['path' => 'Config', 'generate' => true],
            'command' => ['path' => 'Console', 'generate' => true],
            'migration' => ['path' => 'Database/Migrations', 'generate' => true],
            'seeder' => ['path' => 'Database/Seeders', 'generate' => true],
            'factory' => ['path' => 'Database/factories', 'generate' => true],
            'model' => ['path' => 'Entities', 'generate' => true],
            'controller' => ['path' => 'Http/Controllers', 'generate' => true],
            'filter' => ['path' => 'Http/Middleware', 'generate' => true],
            'request' => ['path' => 'Http/Requests', 'generate' => true],
            'provider' => ['path' => 'Providers', 'generate' => true],


            'vueapp/assets' => ['path' => 'vueapp/assets', 'generate' => true],
            'vueapp/components' => ['path' => 'vueapp/components', 'generate' => true],
            'vueapp/css' => ['path' => 'vueapp/css', 'generate' => true],
            'vueapp/i18n' => ['path' => 'vueapp/i18n', 'generate' => true],
            'vueapp/i18n/en' => ['path' => 'vueapp/i18n/en', 'generate' => true],
            'vueapp/layouts' => ['path' => 'vueapp/layouts', 'generate' => true],
            'vueapp/pages' => ['path' => 'vueapp/pages', 'generate' => true],
            'vueapp/plugins' => ['path' => 'vueapp/plugins', 'generate' => true],
            'vueapp/router' => ['path' => 'vueapp/router', 'generate' => true],
            'vueapp/statics' => ['path' => 'vueapp/statics', 'generate' => true],
            'vueapp/store' => ['path' => 'vueapp/store', 'generate' => true],

            'lang' => ['path' => 'Resources/lang', 'generate' => true],
            'langEn' => ['path' => 'Resources/lang/en', 'generate' => true],
            'views' => ['path' => 'Resources/views', 'generate' => true],
            'test' => ['path' => 'Tests', 'generate' => true],
            'repository' => ['path' => 'Repositories', 'generate' => false],
            'event' => ['path' => 'Events', 'generate' => false],
            'listener' => ['path' => 'Listeners', 'generate' => false],
            'policies' => ['path' => 'Policies', 'generate' => false],
            'rules' => ['path' => 'Rules', 'generate' => false],
            'jobs' => ['path' => 'Jobs', 'generate' => false],
            'emails' => ['path' => 'Emails', 'generate' => false],
            'notifications' => ['path' => 'Notifications', 'generate' => false],
            'resource' => ['path' => 'Transformers', 'generate' => false],
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Scan Path
    |--------------------------------------------------------------------------
    |
    | Here you define which folder will be scanned. By default will scan vendor
    | directory. This is useful if you host the package in packagist website.
    |
    */

    'scan' => [
        'enabled' => false,
        'paths' => [
            base_path('vendor/*/*'),
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Composer File Template
    |--------------------------------------------------------------------------
    |
    | Here is the config for composer.json file, generated by this package
    |
    */

    'composer' => [
        'vendor' => 'ansezz',
        'author' => [
            'name' => 'Anass Ez-zouaine',
            'email' => 'ans-ezzouaine@hotmail.com',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Caching
    |--------------------------------------------------------------------------
    |
    | Here is the config for setting up caching feature.
    |
    */
    'cache' => [
        'enabled' => false,
        'key' => 'laravel-modules',
        'lifetime' => 60,
    ],
    /*
    |--------------------------------------------------------------------------
    | Choose what laravel-modules will register as custom namespaces.
    | Setting one to false will require you to register that part
    | in your own Service Provider class.
    |--------------------------------------------------------------------------
    */
    'register' => [
        'translations' => true,
        /**
         * load files on boot or register method
         *
         * Note: boot not compatible with asgardcms
         *
         * @example boot|register
         */
        'files' => 'register',
    ],
];
