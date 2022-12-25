<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use App\Helpers\helper;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $quantity=$request->quantity;
        $id=$request->id;

        $products=Product::where('id',$id)->first();
        $data['quantity']=$quantity;
        $data['id']=$products->id;
        $data['name']=$products->name;
        $data['price']=$products->price;
        $data['attribute']=[$products->image];

        \Cart::add( $data);
        helper::cardArray();
        
        return redirect()->back();
        
    }
}
