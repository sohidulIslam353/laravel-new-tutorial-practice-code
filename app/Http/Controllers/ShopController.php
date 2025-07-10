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

    // create shop
    public function create()
    {
        return view('shop.create');
    }

    // store method
    public function store(Request $request)
    {


        // validate form data
        $request->validate([
            'shop_name' => 'required|max:255|unique:shops',
            'shop_number' => 'required|max:255',
            'shop_address' => 'required|max:255',
            'shop_phone' => 'required|max:255',
            'shop_email' => 'required|email|max:55',
            'tin_number' => 'required|max:25',
        ]);

        // insert data into database table
        DB::table('shops')->insert([
            'shop_name' => $request->shop_name,
            'shop_number' => $request->shop_number,
            'shop_address' => $request->shop_address,
            'shop_phone' => $request->shop_phone,
            'shop_email' => $request->shop_email,
            'tin_number' => $request->tin_number,
            'created_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Shop created successfully');
    }
}
