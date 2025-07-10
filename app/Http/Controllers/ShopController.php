<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    // shop list
    public function index()
    {
        // read data from database table
        $shopLists = DB::table('shops')->get();

        return view('shop.index', compact('shopLists'));
    }
}
