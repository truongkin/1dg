<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(
        //     'App\Repositories\NewsRepositoryInterface',
        //     'App\Repositories\NewsRepository');
            $this->app->bind(
                App\FrontEnd\Repositories\Category\CategoryRepositoryInterface::class,
                \App\FrontEnd\Repositories\Category\CategoryRepository::class,
            );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
