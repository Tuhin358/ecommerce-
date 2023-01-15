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

        <p class="alert-success">
            @php
                $message=Session::get('message');
                if($message){
                    echo $message;
                }else{
                    Session::put('message',null);
                }
            @endphp
        </p>
        <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Unit</h2>

    </div>

    <div class="box-content">
        <form class="form-horizontal" action="{{route('unit.store')}}" method="post" >
            @csrf

            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="date01">Unit Name</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="name" required>
                    </div>
                </div>


                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Unit Description</label>
                    <div class="controls">
                        <textarea class="cleditor" name="description" rows="3" required></textarea>
                    </div>

                </div>




                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Add Unit</button>
                </div>
            </fieldset>
        </form>

    </div>
</div><!--/span-->
</div><!--/row-->
</div><!--/row-->


@endsection


