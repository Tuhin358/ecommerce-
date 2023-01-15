@extends('admin.admin_master')
@section('admin.content')

{{--  @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif  --}}

<div class="row-fluid sortable">
<div class="box span12">
    <div class="box-header" data-original-title>

        {{--  <p class="alert-success">
            @php
                $message=Session::get('message');
                if($message){
                    echo $message;
                }else{
                    Session::put('message',null);
                }
            @endphp
        </p>  --}}
        <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product</h2>

    </div>

    <div class="box-content">
        <form class="form-horizontal" action="{{route('product.update',$product->id)}}" method="POST" >

            <input type="hidden" value="{{$product->id }}" name="product_id">

            @csrf
            @method('put')

            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="date01">Product Code</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="code" value="{{$product->code}}" >
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="date01">Product Name</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="name" value="{{$product->name}}" >
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label">Select Category</label>
                    <div class="control">
                        <select name="category" style="margin-left: 20px">
                            <option>Select Category</option>

                            @foreach ($categories as $category)

                            <option value="{{$category->id }}">{{$category->name}}</option>

                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Select SubCategory</label>
                    <div class="control">
                        <select name="subcategory" style="margin-left:20px">
                            <option>Select SubCategory</option>

                            @foreach ($subcategories as $subcategory)

                            <option value="{{$subcategory->id }}">{{$subcategory->name}}</option>

                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Select Brand</label>
                    <div class="control">
                        <select name="brand" style="margin-left: 20px">
                            <option>Select Brand</option>

                            @foreach ($brands as $brand)

                            <option value="{{$brand->id }}">{{$brand->name}}</option>

                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Select Unit</label>
                    <div class="control">
                        <select name="unit" style="margin-left: 20px">
                            <option>Select Unit</option>

                            @foreach ($units as $unit)

                            <option value="{{$unit->id }}">{{$unit->name}}</option>

                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label">Select Size</label>
                    <div class="control">
                        <select name="size" style="margin-left: 20px">
                            <option>Select Size</option>

                            @foreach ($sizes as $size)

                            <option value="{{$size->id }}">{{$size->size}}</option>
                            {{--  {{implode(',',Json_decode($size->size))}}  --}}

                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Select Colors</label>
                    <div class="control">
                        <select name="color" style="margin-left: 20px">
                            <option>Select color</option>

                            @foreach ($colors as $color)

                            <option value="{{$color->id }}">{{$color->color}}</option>

                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Product Description</label>
                    <div class="controls">
                        <textarea class="cleditor" name="description"  required>{{$product->description}}</textarea>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="date01">Product Price</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="price" value="{{$product->price}}" >
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">File Upload</label>
                    <div class="controls">
                        <input type="file" name="file[]" multiple required>
                    </div>
                </div>


                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </fieldset>
        </form>

    </div>
</div><!--/span-->
</div><!--/row-->
</div><!--/row-->


@endsection

