<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    // shop list
    public function index(Request $request)
    {
        $shopCount = DB::table('shops')->count();

        // read data from database table
        $query = DB::table('shops')->orderBy('id');

        if ($search = $request->search) {
            $query->where(function ($q) use ($search) {
                $q->where('shop_name', 'like', '%' . $search . '%')
                    ->orWhere('shop_number', 'like', '%' . $search . '%')
                    ->orWhere('shop_email', 'like', '%' . $search . '%')
                    ->orWhere('tin_number', 'like', '%' . $search . '%');
            });
        }

        $shopLists = $query->cursorPaginate(12)->appends(['search' => $request->search]);

        return view('shop.index', compact('shopLists', 'shopCount'));
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

    // edit method
    public function edit($id)   // 1
    {
        $shop = DB::table('shops')->where('id', $id)->first();  // get()  // first()

        return view('shop.edit', compact('shop'));
    }

    // update method
    public function update(Request $request, $id)
    {
        // validate form data
        $request->validate([
            'shop_name' => 'required|max:255|unique:shops,shop_name,' . $id,
            'shop_number' => 'required|max:255',
            'shop_address' => 'required|max:255',
            'shop_phone' => 'required|max:255',
            'shop_email' => 'required|email|max:55',
            'tin_number' => 'required|max:25',
        ]);

        try {
            DB::table('shops')->where('id', $id)->update([
                'shop_name' => $request->shop_name,
                'shop_number' => $request->shop_number,
                'shop_address' => $request->shop_address,
                'shop_phone' => $request->shop_phone,
                'shop_email' => $request->shop_email,
                'tin_number' => $request->tin_number,
                'updated_at' => now(),
            ]);

            return redirect()->route('shop.index')->with('success', 'Shop updated successfully');
        } catch (\Exception $e) {
            Log::info('Error updating shop: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update shop: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        DB::table('shops')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Shop deleted successfully');
    }
}
