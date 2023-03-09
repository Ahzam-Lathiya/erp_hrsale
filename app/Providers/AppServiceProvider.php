<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View as FacadeView;
use Illuminate\View\View;

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
        //shared in all views, anywhere possible
        // available in Illuminate\View\View
        //View::share('global_val', 'certainly');

        /*
        View composers are callbacks or class methods that 
        are called when a view is rendered
        */

        //shared in specified view
        // FacadeView::composer('layout.main', 
        //     function(View $view){
        //         $view->with('global_val', 'certainly');
        // });

        //shared in multiple views
        // Illuminate\Support\Facades\View
        FacadeView::composer(
            ['layout.main','layout.snippet.navigation','login_form'], 
            function(View $view){
                $view->with('global_val', 'certainly');
        });

        //shared in all views
        // Illuminate\Support\Facades\View
        // FacadeView::composer('*', 
        //     function(View $view){
        //         $view->with('global_val', 'certainly');
        // });

        /*
            View "creators" are very similar to view composers; 
            however, they are executed immediately after the view is instantiated
            instead of waiting until the view is about to render
        */

        // FacadeView::creator(
        //     ['layout.main','layout.snippet.navigation','login_form'], 
        //     function(View $view){
        //         $view->with('global_val', 'certainly');
        // });

    }
}

?>