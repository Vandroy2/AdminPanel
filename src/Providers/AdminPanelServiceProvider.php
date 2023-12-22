<?php

namespace Edguy\AdminPanel\Providers;

use Edguy\AdminPanel\Http\Middleware\Authenticate;
use Edguy\AdminPanel\Http\Middleware\LoginMiddleware;
use Edguy\AdminPanel\Http\Middleware\LogoutMiddleware;
use Edguy\AdminPanel\Http\Middleware\RedirectifAuthenticated;
use Illuminate\Support\ServiceProvider;

class AdminPanelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'AdminPanel');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadRoutesFrom(__DIR__.'/../routes/admin.php');

        $this->publishes([
            __DIR__.'/../public' => app()->path('public'),
            __DIR__.'/../resources/views' => resource_path('views/admin'),
            __DIR__.'/../Traits' => app()->path('Traits'),
            __DIR__.'/../Http/Requests' => app()->path('Http/Requests'),
            __DIR__.'/../Services' => app()->path('Services'),
            __DIR__.'/../Helpers' => app()->path('Helpers'),
            __DIR__.'/../routes/admin.php' => base_path('routes/admin.php'),
        ], 'adminPanel');

        $this->app['router']->aliasMiddleware('admin.login', LoginMiddleware::class);

        $this->app['router']->aliasMiddleware('admin.logout', LogoutMiddleware::class);

        $this->app['router']->aliasMiddleware('auth.admin', Authenticate::class);

        $this->app['router']->aliasMiddleware('guest.admin', RedirectifAuthenticated::class);

    }

}