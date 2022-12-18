@extends('admin.admin_master')
@section('admin_content');

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
                      <th style="width: 5%">ID</th>
                      <th style="width: 15%">Category Name</th>
                      <th style="width: 30%">Description</th>
                      <th style="width: 15%">Image</th>
                      <th style="width: 15%">Status</th>
                      <th style="width: 20%">Actions</th>
                  </tr>
              </thead> 
              
              @foreach ($categories as $category)
              <tbody>
                <tr>
                    <td>{{ $category->id }}</td>
                    <td class="center">{{ $category->name }}</td>
                    <td class="center">{{ $category->description }}</td>
                    <td>
                        <img src="{{ asset('/storage/'.$category->image) }}" style="widows: 150px; height: 80px;" alt="">
                    </td>
                    <td class="center">
                        <span class="label label-success">Active</span>
                    </td>
                    <td class="center">
                        <a class="btn btn-success" href="#">
                            <i class="halflings-icon white zoom-in"></i>  
                        </a>
                        <a class="btn btn-info" href="#">
                            <i class="halflings-icon white edit"></i>  
                        </a>
                        <a class="btn btn-danger" href="#">
                            <i class="halflings-icon white trash"></i> 
                        </a>
                    </td>
                </tr>

              </tbody>
              @endforeach
          </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection