<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class CelestialObjectsDataFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        //this key is used for binding the underlying service in service provider

        // echo "Calling after binding" . '<br>';
        return 'CelestialObjectsData';
    }
}

?>