<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;

class OrderController extends Controller
{
    public function manage_order()
    {
        $orders=Order::all();
        return view('admin.order.manage_order',compact('orders'));
    }

    public function view_order($id)
    {
        $orders=Order::where('orders.id',$id)->first();
        $order_by_id=OrderDetail::where('order_id',$id)->get();
        return view('admin.order.view_order',compact('orders','order_by_id'));
    }
    public function change_status(Order $order)
    {
        if ($order->status ==1)
        {
            $order->update(['status' =>0]);
        }
        else
        {
            $order->update(['status' =>1]);
        }
        return redirect()->back()->with('message','Status updated successfully');
    }
    public function destroy($id)
    {
        // $delete=$order->delete();
        // if ($delete)
        // return redirect()->back()->with('message','order deleted successfully');

        $orders = Order::where('orders.id', $id)->first()->delete();
        return redirect()->back()->with('message','order deleted successfully');
    }
}
