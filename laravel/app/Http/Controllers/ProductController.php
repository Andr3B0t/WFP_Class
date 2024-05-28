<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //1. melakukan query
        // 2. hasil query kita kirim ke view

        $raw = DB::select("SELECT * FROM products");
        //var_dump($raw);

        $queryBuilder = DB::table('products as p')
                        ->get();

        //Alter 1
        //return view('product.index', compact('queryBuilder'));

        //Alter 2
        return view('product.index',['data' => $queryBuilder]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.formcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =new Product();
        $data->name = $request->get("product_name");
        $data->price = $request->get("product_price");
        $data->hotel_id = $request->get("product_hotel");
        $data->available_room = $request->get("product_room");
        $data->images = $request->get("product_images");
        $data->save();
        return redirect()->route('product.index')->with('status','Horray ! Your data is successfully recorded !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Product::find($id);

        dd($data);

        return view('product.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
