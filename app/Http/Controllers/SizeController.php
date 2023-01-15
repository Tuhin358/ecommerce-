<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::all();
        return view('admin.size.index',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sizes=explode(',',$request->size);
        $size=new Size();
        $size->size=json_encode ($sizes);
        $size->save();
        return redirect()->back()->with('message','Size Added Successfully ');

        // $sizes=explode(',', $request->size);
        // $size=new Size();
        // $size->size=Json_encode($sizes);
        // $size->save();
        // return redirect()->back()->with('message','Size Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status(Size $size)
    {
        if($size->status==1){
            $size->update(['status'=>0]);
        }
        else{
            $size->update(['status'=>1]);

        }
        return redirect()->back()->with('message','Status change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $size = Size::findOrFail($id);
        return view('admin.size.edit',compact('size'));

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
        $size_id = $request->size_id;
        $request->validate([
            'size'=>'required|unique:sizes',
        ]);

        Size::findOrFail($size_id)->update([
            'size'=>$request->size,

        ]);
        return redirect()->route('size.all')->with('message','Size Update Successfully!');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Size::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Size Delete Successfully');
    }
}
