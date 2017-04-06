<?php

namespace CODE4FUN\Admin\Providers;

use CODE4FUN\Admin\Facades\Admin;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $commands = [
        'CODE4FUN\Admin\Commands\MakeCommand',
        'CODE4FUN\Admin\Commands\MenuCommand',
        'CODE4FUN\Admin\Commands\InstallCommand',
        'CODE4FUN\Admin\Commands\UninstallCommand',
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'admin.auth'        => \CODE4FUN\Admin\Middleware\Authenticate::class,
        'admin.pjax'        => \CODE4FUN\Admin\Middleware\PjaxMiddleware::class,
        'admin.log'         => \CODE4FUN\Admin\Middleware\OperationLog::class,
        'admin.permission'  => \CODE4FUN\Admin\Middleware\PermissionMiddleware::class,
        'admin.bootstrap'   => \CODE4FUN\Admin\Middleware\BootstrapMiddleware::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'admin' => [
            'admin.auth',
            'admin.pjax',
            'admin.log',
            'admin.bootstrap',
        ],
    ];

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../views', 'admin');
        $this->loadTranslationsFrom(__DIR__.'/../../lang/', 'admin');

        $this->publishes([__DIR__.'/../../config/admin.php' => config_path('admin.php')], 'laravel-admin');
        $this->publishes([__DIR__.'/../../assets' => public_path('packages/admin')], 'laravel-admin');

        Admin::registerAuthRoutes();

        if (file_exists($routes = admin_path('routes.php'))) {
            require $routes;
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->booting(function () {
            $loader = AliasLoader::getInstance();

            $loader->alias('Admin', \CODE4FUN\Admin\Facades\Admin::class);

            if (is_null(config('auth.guards.admin'))) {
                $this->setupAuth();
            }
        });

        $this->registerRouteMiddleware();

        $this->commands($this->commands);
    }

    /**
     * Setup auth configuration.
     *
     * @return void
     */
    protected function setupAuth()
    {
        config([
            'auth.guards.admin.driver'    => 'session',
            'auth.guards.admin.provider'  => 'admin',
            'auth.providers.admin.driver' => 'eloquent',
            'auth.providers.admin.model'  => 'CODE4FUN\Admin\Auth\Database\Administrator',
        ]);
    }

    /**
     * Register the route middleware.
     *
     * @return void
     */
    protected function registerRouteMiddleware()
    {
        // register route middleware.
        foreach ($this->routeMiddleware as $key => $middleware) {
            app('router')->middleware($key, $middleware);
        }

        // register middleware group.
        foreach ($this->middlewareGroups as $key => $middleware) {
            app('router')->middlewareGroup($key, $middleware);
        }
    }
}
