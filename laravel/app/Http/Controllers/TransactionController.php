<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaction::all();

        return view('transaction.index', compact('data'));
    }

    public function showAjax(Request $request)
    {
        $id = ($request->get('id'));
        $data = Transaction::find($id);
        $products = $data->products;
        return response()->json(array(
            'msg' => view('transaction.showModal', compact('data','products'))->render()
        ), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Product::all();
        return view('transaction.formcreate',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = Product::find($id);
        // return view('transaction.formcreate',compact('data'));
        $product_id = $request->get('product');
        $product = Product::find($product_id);
        $quantity = $request->get('quantity');
        $total = $quantity * $product->price;
        $data =new Transaction();
        $data->customer_id = $request->get("customer_id");
        $data->user_id = $request->get("user_id");
        $data->save();
        $data->products()->attach($product,[
            'quantity' => $quantity,
            'subtotal' => $total,
        ]);
        return redirect()->route('transaction.index')->with('status','Horray ! Your data is successfully recorded !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
