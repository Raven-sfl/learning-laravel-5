<?php

namespace App\Providers;

use App\Article;
use App\Object;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $latest_articles = Article::latest('published_at')->published()->take(5)->get(['id', 'title']);
        view()->share('latest_articles', $latest_articles);
        $latest_objects = Object::latest('published_at')->published()->take(5)->get();
        view()->share('latest_objects', $latest_objects);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
