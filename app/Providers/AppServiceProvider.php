<?php


namespace App\Providers;

// add this to the top of the file
use Illuminate\Support\Facades\URL;

use Inertia\Inertia;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

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
        Inertia::share('flash', function () {
            return ['status' => Session::get('status')];
        });

        if($this->app->environment('production')) {
            URL::forceScheme('https');
        };
    }
}
