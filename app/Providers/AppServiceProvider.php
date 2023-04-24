<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View as FacadeView;
use Illuminate\View\View;

use App\Services\Sampler;
use App\Services\PrettyPrinter;
use App\Services\CelestialObjectsData;
use App\Services\SamplerSubServices\{SubServiceA,SubServiceB};

use App\Contracts\Printer;
use App\Contracts\SamplerSubService;

use App\Http\Controllers\LogicController;

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
        echo "Registering App Service Provider" . "<br>";

        // $this->app->resolving(Sampler::class, function($object, $app){
        //     echo "Resolving" . '<br>';
        //     \print_r($object);
        //     echo "Done" . '<br>';
        // });

        //$this->app->bind('PrettyPrinter', function ($app){
            //echo "still runs"  . '<br>';
            //return new PrettyPrinter();
        //});

        $this->app->bind('CelestialObjectsData', function ($app){
            // echo "still runs"  . '<br>';
            return new CelestialObjectsData();
        });

        // The same sampler instance will be returned whenever the 'Sampler' class 
        // is requested from the container
        // Even The __construct function of the class won't be called again
        // $this->app->singleton(Sampler::class, function ($app){
        //     // echo "still runs"  . '<br>';
        //     //return new Sampler('abcd');
        //     return $app->make(Sampler::class);
        // });

        // This method is similar to the singleton method, instances registered using
        // the scoped method will be flushed whenever the laravel app starts a new lifecycle 
        // is requested from the container
        // Even The __construct function of the class won't be called again
        // $this->app->scoped(Sampler::class, function ($app){
        //     // echo "still runs"  . '<br>';
        //     return new Sampler('abcd');
        // });

        //just like singleton, the very same instance is returned 
        //on all calls to the container
        //$sampler = new Sampler('abcd');
        //$this->app->instance(Sampler::class, $sampler);

        // $this->app
        // ->when(Sampler::class)
        // ->needs('$val')
        // ->give('SAMPLING VALUE STRING');

        // $this->app
        // ->when(LogicController::class)
        // ->needs('$size')
        // ->give('1889');

        // $this->app->bind(Printer::class, function($app){
        //     echo "PrettyPrinter in Provider" . '<br>';
        //     return new PrettyPrinter();
        // });

        // $this->app
        // ->when(LogicController::class)
        // ->needs(Printer::class)
        // ->give(function($app){
        //     return new PrettyPrinter();
        // });

        // $this->app->bind(SubServiceA::class, function($app){
        //     return new SubServiceA('jjj');
        // });

        //the SubServiceA & SubServiceB are tagged into a common name 'sub_services'
        // $this->app->tag([
        //     SubServiceA::class,
        //     SubServiceB::class
        // ], 'sub_services');

        //typed variadic binding,
        // if a tagged bindind exists then it will be used for resolving.
        // $this->app->when(Sampler::class)
        // ->needs(SamplerSubService::class)
        // ->giveTagged('sub_services');

        //binding an interface to a class
        // $this->app->bind(Printer::class, PrettyPrinter::class);
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
        // FacadeView::composer(
        //     ['layout.main','layout.snippet.navigation','login_form'], 
        //     function(View $view){
        //         $view->with('global_val', 'certainly');
        // });

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