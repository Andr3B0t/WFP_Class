<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Customer::all();
        return view('customer.index',compact('data'));
    }

    public function store(Request $request)
    {
        $data =new Customer();
        $data->name = $request->get("customer_name");
        $data->address = $request->get("customer_address");
        $data->save();
        return redirect()->route('customer.index')->with('status','Horray ! Your data is successfully recorded !');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.formcreate');
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
