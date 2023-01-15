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
                      <th style="width:10%">id</th>
                      <th style="width:20%"> Unit Name</th>
                      <th style="width:40%">Description</th>
                      <th style="width:10%">Status</th>
                      <th style="width:20%">Actions</th>
                  </tr>
              </thead>
              @foreach ($units as $unit)

              <tbody>
                <tr>
                    <td>{{ $unit->id }}</td>
                    <td class="center">{{$unit->name }}</td>
                    <td class="center">{{$unit->description }}</td>


                    <td class="center ">
                        @if($unit->status==1)

                        <span class="label label-success">Active</span>
                        @else
                        <span class="label label-danger">Deactive</span>

                        @endif

                    </td>

                    <td class="row">
                        <div class="span3"></div>

                        <div class="span4">
                            @if($unit->status==1)
                        <a href="{{url('/unit-status'.$unit->id) }}" class="btn btn-success">

                            <i class="halflings-icon white thumbs-down"></i>
                        </a>
                        @else
                        <a href="{{url('/unit-status'.$unit->id) }}" class="btn btn-danger">

                            <i class="halflings-icon white thumbs-up"></i>
                        </a>
                        @endif

                        <a href="{{route('unit.edit',$unit->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{route('unit.delete',$unit->id) }}" class="btn btn-warning">Delete</a>

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
