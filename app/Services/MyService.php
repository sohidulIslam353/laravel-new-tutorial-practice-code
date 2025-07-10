<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;



class MyService
{


    public static function userName()
    {
        Log::info('MyService says hello!');
        return "Hello from MyService!";
    }
}
