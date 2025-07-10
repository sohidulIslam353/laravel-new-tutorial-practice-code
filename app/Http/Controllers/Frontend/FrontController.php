<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;
use App\Http\Requests\StorePostRequest;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FrontController extends Controller
{


    // Store method 
    public function store(StorePostRequest $request)
    {
        Log::warning('warning message ');
        Log::info('Store method called with data: ', $request->all());
    }
}
