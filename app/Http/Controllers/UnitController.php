<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::all();
        return view('admin.unit.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unit=new Unit();
        $unit->name=$request->name;
        $unit->description=$request->description;

        $unit->save();
        return redirect()->back()->with('message','Unit Successfully Created');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status(Unit $unit)
    {
        if($unit->status==1){
            $unit->update(['status'=>0]);
        }
        else{
            $unit->update(['status'=>1]);

        }
        return redirect()->back()->with('message','Units change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit= Unit::findOrFail($id);
        return view('admin.unit.edit',compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $unit_id = $request->unit_id;
        $request->validate([
            'name'=>'required|unique:units',
            'description'=>'required',
        ]);

        Unit::findOrFail($unit_id)->update([
            'name'=>$request->name,
            'description'=>$request->description,

        ]);
        return redirect()->route('unit.all')->with('message','unit Update Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Unit::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Unit Delete Successfully');

    }
}
