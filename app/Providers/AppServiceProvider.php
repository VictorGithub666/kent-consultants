<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\WebsiteSetting;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Share website settings with all views
        View::composer('*', function ($view) {
            $settings = WebsiteSetting::all()->pluck('value', 'key');
            $view->with('settings', $settings);
        });
    }
}