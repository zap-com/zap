<?php

namespace App\Providers;

use App\Models\Category;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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

        //Fix migrazione da clone progetto 
        if (!Schema::hasTable('categories')) {
            return;
        }
        Paginator::useBootstrap();
        $categories = Category::orderBy('name', 'asc')->get();
        View::share('categories', $categories);
    }
}
