<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\Contracts\AdminLoginLogRepository::class, \App\Repositories\Eloquent\AdminLoginLogRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\AdminAdminRoleRepository::class, \App\Repositories\Eloquent\AdminAdminRoleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\AdminRoleRepository::class, \App\Repositories\Eloquent\AdminRoleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\AdminPermissionRepository::class, \App\Repositories\Eloquent\AdminPermissionRepositoryEloquent::class);
        //:end-bindings:
    }
}
