@extends('admin.admin_master')
<<<<<<< HEAD
@section('admin_content')
=======
@section('admin_content');
>>>>>>> f814d9fd8e76180f2b419dbd5ad7201a4db7731c

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
                      <th style="width: 5%">Code</th>
                      <th style="width: 10%">Product Name</th>
                      <th style="width: 12%">Description</th>
                      <th style="width: 5%">Price</th>
                      <th style="width: 30%">Image</th>
                      <th style="width: 5%">Cat Name</th>
                      <th style="width: 5%">SubCat Name</th>
                      <th style="width: 5%">Brand</th>
                      <th style="width: 8%">Status</th>
                      <th style="width: 15%">Actions</th>
                  </tr>
              </thead> 
              
              @foreach ($products as $product)
              @php
                  $product['image']=explode("|",$product->image);
              @endphp
              <tbody>
                <tr>
                    <td>{{ $product->code }}</td>
                    <td class="center">{{ $product->name }}</td>
                    <td class="center">{{ $product->description }}</td>
                    <td class="center">&#2547;{{ $product->price }}</td>
                    <td>
                        @foreach ($product->image as $images)
                        <img src="{{ asset('/image/'.$images) }}" style="width: 15%; height: 15%;" alt="">
                        @endforeach
                    </td>
                    <td class="center">{{ $product->category->name }}</td>
                    <td class="center">{{ $product->subcategory->name }}</td>
                    <td class="center">{{ $product->brand->name }}</td>
                    <td class="center">
                    @if($product->status ==1)
                        <span class="label label-success">Active</span>
                    @else
                        <span class="label label-danger">Deactive</span>
                        @endif
                    </td>
                    <td class="row">
                        <div class="span3">

                        </div>
                        <div class="span3" >
                            @if($product->status ==1)
                        <a href="{{url('/product-status'.$product->id)}}"class="btn btn-success" >
                            <i class="halflings-icon white thumbs-down"></i>  
                        </a>
                        @else
                        <a href="{{url('/product-status'.$product->id)}}" class="btn btn-danger" >
                            <i class="halflings-icon white thumbs-up"></i>  
                        </a>
                        @endif
                        </div>
                        <div class="span3">
                            <a class="btn btn-info" href="{{url('/products/'.$product->id.'/edit')}}">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                        </div>
                        <div class="span3">
                            <form action="{{url('/products/'.$product->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="halflings-icon white trash"></i></button>
                        </form>
                        </div>
                        <div class="span3">
                            
                        </div>
                    </td>
                </tr>

              </tbody>
              @endforeach
          </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection