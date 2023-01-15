@extends('admin.admin_master')
@section('admin.content')


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

            <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th style="width:10%">Sub_Cat id</th>
                      <th style="width:15%">SubCategory Name</th>
                      <th style="width:10%"> Category_Name</th>
                      <th style="width:35%">Description</th>
                      <th style="width:10%">Status</th>
                      <th style="width:30%">Actions</th>
                  </tr>
              </thead>
              @foreach ($subcategories as $subcategory)

              <tbody>
                <tr>
                    <td>{{ $subcategory->id }}</td>
                    <td class="center">{{$subcategory->name }}</td>
                    <td class="center">{{$subcategory->category->name }}</td>
                    <td class="center">{{$subcategory->description }}</td>

                    <td class="center ">
                        @if($subcategory->status==1)

                        <span class="label label-success">Active</span>
                        @else
                        <span class="label label-danger">Deactive</span>

                        @endif

                    </td>

                    <td class="row">
                        <div class="span3"></div>

                        <div class="span4">
                            @if($subcategory->status==1)
                        <a href="{{url('/subcat-status'.$subcategory->id) }}" class="btn btn-success">

                            <i class="halflings-icon white thumbs-down"></i>
                        </a>
                        @else
                        <a href="{{url('/subcat-status'.$subcategory->id) }}" class="btn btn-danger">

                            <i class="halflings-icon white thumbs-up"></i>
                        </a>
                        @endif

                        <a href="{{route('subcategory.edit',$subcategory->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{route('subcategory.delete',$subcategory->id) }}" class="btn btn-warning">Delete</a>

                    </div>

                    </div>
                        <div class="spamn3"></div>
                    </td>
                </tr>


              </tbody>
              @endforeach
          </table>
        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection
