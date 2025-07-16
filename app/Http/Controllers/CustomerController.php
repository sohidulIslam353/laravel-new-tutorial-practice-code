<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerDetail;
use App\Models\Scopes\OnlyActiveCustomers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $customerCount = Customer::count();

        // read data from database table
        $query = Customer::with('customer_detail:customer_id,dob,address')->withTrashed()->orderBy('id');

        if ($search = $request->search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $customers = $query->cursorPaginate(12)->appends(['search' => $request->search]);


        return view('customer.index', compact('customers', 'customerCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        // insert data into database table
        // Customer::create([
        //     'name' => $request->name,
        //     'phone' => $request->phone,
        //     'email' => $request->email,
        // ]);

        // object create
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->status = 'active';
        $customer->save();

        return redirect()->back()->with('success', 'Customer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::find($id);  // single customer data
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form data
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:255|unique:customers,phone,' . $id,
            'email' => 'required|max:255|unique:customers,email,' . $id,
        ]);

        // update data row by model orm
        // $customer = Customer::find($id);
        // $customer->name = $request->name;
        // $customer->phone = $request->phone;
        // $customer->email = $request->email;
        // $customer->save();

        $customer = Customer::find($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return redirect()->route('customer.index')->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->back()->with('success', 'Customer deleted successfully');
    }
}
