<?php

namespace App\Providers;

use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
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
        view()->composer('dashboard.includes.left', function($view){
            $view->with('user', Auth::user());
        });

        view()->composer('includes.right-side', function($view){
            $tags = Tag::all();

            for($i = 0; $i < count($tags); $i++){
                if(!$tags[$i]->articles()->first()){
                    unset($tags[$i]);
                }
            }
            
            $view->with('tags', $tags);
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
