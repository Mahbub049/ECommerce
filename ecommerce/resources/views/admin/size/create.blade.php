@extends('admin.admin_master')
@section('admin_content')
{{-- 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script> --}}

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<div class="row-fluid sortable">
<div class="box span12">
    <div class="box-header" data-original-title>
        <p class="alert-success">
            <?php
            
            $message = Session::get('message');
            if($message){
                echo $message;
                Session::put('message',null);
            }
            
            ?>
        </p>
        <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Sizes</h2>

    </div>

    <div class="box-content">
        <form class="form-horizontal" action="{{ url('/sizes/') }}" method="post">
            @csrf
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="date01">Sizes</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="size" id="input" data-role="tagsinput" required>
                    </div>
                </div>


                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Add Sizes</button>
                </div>
            </fieldset>
        </form>

    </div>
</div><!--/span-->
</div><!--/row-->
</div><!--/row-->

@endsection