@extends('admin.admin_master')
@section('admin_content')
<div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <p class="alert-success">
                    <?php

                    $message = Session::get('message');
                    if($message)
                    {
                        echo $message;
                        Session::put('message',null);
                    }
                    ?>
                </p>

            </div>


            <div class="box-content">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Order Total</th>
                        <th>Order Date & Time</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    @foreach($orders as $order)
                        <tbody>
                        <tr>
                            <td>{{$order->id}}</td>
                            <td class="center">{{$order->customer->name}}</td>
                            <td class="center">{{$order->total}}</td>
                            <td class="center">{{\Carbon\Carbon::parse($order->created_at)->format('M d,Y,h:iA')}}</td>

                            <td class="center">

                                @if($order->status ==1)
                                <span class="label label-success">Active</span>
                            @else
                                <span class="label label-danger">Deactive</span>
                                @endif

                            </td>
                            <td class="center">
                        <div class="span2" >
                            @if($order->status ==1)
                        <a href="{{url('/order-status'.$order->id)}}"class="btn btn-success" >
                            <i class="halflings-icon white thumbs-down"></i>  
                        </a>
                        @else
                        <a href="{{url('/order-status'.$order->id)}}" class="btn btn-danger" >
                            <i class="halflings-icon white thumbs-up"></i>  
                        </a>
                        @endif
                        </div>
                            

                                <a class="btn btn-info" href="{{url('/view-order/'.$order->id)}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <div class="span2">
                                    <form action="{{url('/destroy/'.$order->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="halflings-icon white trash"></i></button>
                                </form>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                        @endforeach

                </table>
            
            </div>
        </div><!--/span-->

    </div>

@endsection