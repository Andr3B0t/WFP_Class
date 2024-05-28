<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use DB;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Hotel::all();

        return view('hotel.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    public function showInfo()
    {
        $data = Hotel::join('products as p', 'hotels.id','=','p.hotel_id')
                ->select('hotels.name','p.name as pname','p.price')
                ->orderBy('p.price','DESC')
                ->first();
        // dd($data);
    return response()->json(array(
        'status'=>'oke',
        'msg'=>"<div class='alert alert-info'>
                Did you know? <br>The most expensive product is in $data->name <br> Product : $data->pname<br> Price : $data->price</div>"
    ),200);
    }

    public function showProducts()
    {
        $hotel=Hotel::find($_POST['hotel_id']);
        $nama=$hotel->name;
        $data=$hotel->products;
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('hotel.showProducts',compact('nama','data'))->render()
        ),200);
    }

    public function availableHotelRoom()
    {
        $data = Hotel::join('products as p', 'hotels.id','=','p.hotel_id')
                ->select('hotels.name','hotels.city',DB::raw('sum(p.available_room) as kamar_tersedia'))
                ->groupBy('hotels.id','hotels.name','hotels.city')
                ->get();

        //dd($data);

                return view('hotel.availableRoom', compact('data'));
    }
}
