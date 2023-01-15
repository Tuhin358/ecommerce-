<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories=SubCategory::all();
        return view('admin.subcategory.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategory=new SubCategory();
        $subcategory->cat_id=$request->category;
        $subcategory->name=$request->name;
        $subcategory->description=$request->description;
        // $category->image=$request->image->store('category');

        $subcategory->save();
        return redirect()->back()->with('message','SubCategory Successfully Created');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status(SubCategory $subcategory)
    {
        if($subcategory->status==1){
            $subcategory->update(['status'=>0]);
        }
        else{
            $subcategory->update(['status'=>1]);

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
        $subcategory= SubCategory::findOrFail($id);
        return view('admin.subcategory.edit',compact('subcategory'));

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
        $subcategory_id=$request->subcategory_id;

        $request->validate([
            'name' => 'required|unique:categories',
            'description' => 'required',

        ]);


        SubCategory::findOrFail($subcategory_id)->update([
            'name'=>$request->name,
            'description'=>$request->description,

        ]);
        return redirect()->route('subcategory.all')->with('message','Sub-Category Update Successfully!');

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        SubCategory::findOrFail($id)->delete();
        return redirect()->back()->with('message','Successfully Category Deleted');
    }
}
