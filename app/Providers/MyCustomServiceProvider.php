<?php

namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

use App\Services\PrettyPrinter;

use App\Contracts\Printer;

class MyCustomServiceProvider extends ServiceProvider 
implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    public $singletons = [
        Printer::class => PrettyPrinter::class
    ];

    public function register()
    {
        //
        echo "Registering Custom Service Provider" . "<br>";

        // $this->app->singleton(Printer::class, function($app){
        //     // echo "PrettyPrinter in Provider" . '<br>';
        //     return new PrettyPrinter();
        // });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
    }


    public function provides()
    {
        return [Printer::class];
    }
}
