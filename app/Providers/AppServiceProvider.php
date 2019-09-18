<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Http\ViewComposers\TypeComposer;
use App\Http\ViewComposers\CardComposer;
use App\Http\ViewComposers\UserComposer;

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
        view()->composer('front/index', TypeComposer::class);
        view()->composer('back/cards/template', CardComposer::class);
        view()->composer('back/cards/template', UserComposer::class);         

        Blade::if('admin', function () {
            return auth()->user()->role === 'admin';
        });        
    }
}
