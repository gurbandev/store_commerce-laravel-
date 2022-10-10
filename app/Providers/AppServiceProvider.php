<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
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
        Paginator::useBootstrapFive();
        Model::preventLazyLoading(!app()->isProduction());

        View::composer('app.nav', function ($view) {
            $categories = Category::withCount(['products'])
                ->get();
            $brands = Brand::withCount(['products'])
                ->get();

            $view->with([
                'categories' => $categories,
                'brands' => $brands,
            ]);
        });
    }
}
