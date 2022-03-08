<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        $categories=Category::all();
        View::share('categories',$categories);

        $users=User::all();
        View::share('users',$users);
        Paginator::useBootstrap();
    }
}