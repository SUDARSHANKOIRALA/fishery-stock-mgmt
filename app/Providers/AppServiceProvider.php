<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Item;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('items',Item::All());
    }
}
