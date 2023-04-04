<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class PrettyPrintFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        //this key is used for binding the underlying service in service provider

        // echo "Calling after binding" . '<br>';
        return 'PrettyPrinter';
    }
}

?>