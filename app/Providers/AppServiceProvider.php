<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

use App\Models\Setting;
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
        View::share('settings', Setting::find(1));
    }
}
