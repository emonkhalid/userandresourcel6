<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use App\Category;

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
        //
         Schema::defaultStringLength(191);

         //We pass $categories to layouts.main view
         View::composer('layouts.main', function($view){
         $view->with('categories', Category::where('name','!=','others')->get());
         });
         
    }
}
