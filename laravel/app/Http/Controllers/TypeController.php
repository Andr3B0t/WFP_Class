<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Type::all();
        return view('type.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('type.formcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Type();
        $data->name = $request->get("type_name");
        $data->description = $request->get("type_desc");
        $data->save();
        return redirect()->route('type.index')->with('status', 'Horray ! Your data is successfully recorded !');

    }

    public function getEditForm(Request $request)
    {
        $id = $request->id;
        $data = Type::find($id);
        return response()->json(
            array(
                'status' => 'oke',
                'msg' => view('type.getEditForm', compact('data'))->render()
            ), 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        $data = $type;
        return view("type.formedit", compact("data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $updatedData = $type;
        $updatedData->name = $request->type_name;
        $updatedData->description = $request->type_desc;
        $updatedData->save();
        return redirect()->route('type.index')->with('status', 'Horray ! Your data is successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        try {
            //if no contraint error, then delete data. Redirect to index after it.
            $deletedData = $type;
            $deletedData->delete();
            return redirect()->route('type.index')->with('status', 'Horray ! Your data is successfully deleted !');
        } catch (\PDOException $ex) {
            // Failed to delete data, then show exception message
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('type.index')->with('status', $msg);
        }

    }
}
