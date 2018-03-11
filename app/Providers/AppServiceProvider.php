<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Post;
use App\Tag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // On the view we use, callback function, if we load that view
        // First argument is the layout name
        view()->composer('partial.sidebar', function ($view) {

            // Callback and populate the sidebar
            $archives = Post::archives();
            $tags = Tag::has('posts')->pluck('name');

            $view->with(compact('archives', 'tags'));

        });
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
