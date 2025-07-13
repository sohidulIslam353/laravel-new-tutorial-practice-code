<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // customer list
    public function index(Request $request)
    {

        $customerCount = Customer::count();

        // read data from database table
        $query = Customer::orderBy('id');

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

    // craete page
    public function create()
    {
        return view('customer.create');
    }

    // store customer
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
        $customer->save();

        return redirect()->back()->with('success', 'Customer created successfully');
    }

    // edit
    public function edit($id)  // as like show
    {
        // DB::table('customers')->where('id', $id)->first();
        $customer = Customer::find($id);  // single customer data
        return view('customer.edit', compact('customer'));
    }

    // update customer
    public function update(Request $request, $id)
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

    // destopry 
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->back()->with('success', 'Customer deleted successfully');
    }
}
