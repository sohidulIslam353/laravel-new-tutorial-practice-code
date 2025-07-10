<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class MyServiceFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'myservice'; // This should match the binding in AppServiceProvider
    }
}
