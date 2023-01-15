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
        <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Size</h2>

    </div>

    <div class="box-content">
        <form class="form-horizontal" action="{{route('size.update',$size->id)}}" method="POST"
                enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$size->id }}" name="size_id">
            {{--  @method('PUT')  --}}

            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="date01">size</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="size" value="{{$size->size}}" >
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

