<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
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
       Paginator::useBootstrap();

       view()->composer('*', function($view){
            $view->with('categories', Category::with('SubCategory')->get());
           // $view->with('cartProducts', Cart::where('user_id', auth()->user()->id)->count());
       });
    }
}
