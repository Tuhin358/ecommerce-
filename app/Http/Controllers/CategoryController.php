<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $categories=Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $category=new Category();
        $category->id=$request->category;
        $category->name=$request->name;
        $category->description=$request->description;
        // $category->image=$request->image->store('category');


         if ($request->hasFile('image')){
            $file=$request->file('image');
            $extension= $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move(public_path('/storage/category/'),$filename);
            $category->image= $filename;

        }

        $category->save();
        return redirect()->back()->with('message','Category Successfully Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function change_status(Category $category)
    {
        if($category->status==1){
            $category->update(['status'=>0]);
        }
        else{
            $category->update(['status'=>1]);

        }
        return redirect()->back()->with('message','Status change Successfully');
    }



//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */



    public function edit($id)

    {
        $category= Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));

    }


//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */


    // public function update(Request $request, Category $category)
    // {
    //     $update=$category->update([
    //         'name'=>$request->name,
    //         'description'=>$request->description,
    //         'image'=>$request->file('image')->store('public/category'),

    //     ]);

    //     if($update){
    //         return redirect()->route('category.all')->with('message','Category Updated Succssfully');
    //     }
    // }



    public function update(Request $request){
        $category_id=$request->category_id;

        $request->validate([
            'name' => 'required|unique:categories',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',

        ]);
        {
            $category_id=$request->category_id;
            $cat_image=$request->file('image');
             $img_name=hexdec(uniqid()).'.'. $cat_image->getClientOriginalExtension();
             $request->image->move(public_path('/storage/category/'),$img_name);
             $img_url='/storage/category/'.$img_name;
        }

        Category::findOrFail($category_id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$img_url,

        ]);
        return redirect()->route('category.all')->with('message','Category Update Successfully!');

    }


//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function delete($id)
    {

        Category::findOrFail($id)->delete();
        return redirect()->back()->with('message','Category Deleted');
        // $delete=$id->delete();
        // if($delete){
        //     return redirect()->back()->with('message','Category Deleted');
        // }


    }
 }


