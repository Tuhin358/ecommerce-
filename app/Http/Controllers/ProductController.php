<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view('admin.product.create', compact('categories','subcategories','brands','units','sizes','colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->cat_id = $request->category;
        $product->subcat_id = $request->subcategory;
        $product->br_id = $request->brand;
        $product->unit_id = $request->unit;
        $product->size_id = $request->size;
        $product->color_id = $request->color;

        $product->code = $request->code;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        $images=array();
        if($files=$request->file('file')){
            $i=0;
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $fileNameExtract=explode('.',$name);
                $fileName=$fileNameExtract[0];
                $fileName.=time();
                $fileName.=$i;
                $fileName.='.';
                $fileName.=$fileNameExtract[1];

                $file->move('image',$fileName);
                $images[]=$fileName;
                $i++;
            }
            $product['image'] = implode("|",$images);

            $product->save();
            return redirect()->back()->with('message', 'New Products added Succesfully!');
        }
        else{
            echo "error";
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status(Product $product)
    {
        if($product->status==1){
            $product->update(['status'=>0]);
        }
        else{
            $product->update(['status'=>1]);

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
         $product = Product::findOrFail($id);
        // $product = Product::all();
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view('admin.product.edit', compact('product','categories','subcategories','brands','units','sizes','colors'));
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
        // return $request->all();
        try{
            DB::beginTransaction();

            $product_id = $request->product_id;

            $request->validate([
                'code'=>'required|unique:products',
                'name'=>'required',
                // 'cat_id'=>'required',
                // 'subcat_id'=>'required',
                // 'br_id'=>'required',
                // 'unit_id'=>'required',
                // 'size_id'=>'required',
                // 'color_id'=>'required',
                'description'=>'required',
                'price'=>'required',
            ]);

            $product= Product::findOrFail($product_id)->update([

                'code'=>$request->code,
                'name'=>$request->name,
                'description'=>$request->description,
                'price'=>$request->price,

                'cat_id'=>$request->category,
                'subcat_id'=>$request->subcategory,
                'br_id'=>$request->brand,
                'unit_id'=>$request->unit,
                'size_id'=>$request->size,
                'color_id'=>$request->color,


            ]);
            if($product)
            {
                DB::commit();
                return redirect()->route('product.all')->with('message','Product Update Successfully!');

            }


        }
        catch(Exception $ex){
            DB::rollBack();
            return $ex->getMessage();
        }





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Product Delete Successfully');

    }
}
