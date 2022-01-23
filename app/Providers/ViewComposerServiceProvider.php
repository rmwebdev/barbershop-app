<?php 
namespace App\Providers;

// use DB;
use Illuminate\Support\ServiceProvider;
// use Log;
use App\Models\Setting;
class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // view()->composer('frontend', function($view) {
        //     $settings = Setting::find(1);
        //     Log::info($settings);
        //     $view->with('settings', $settings);
        // });
    }
}