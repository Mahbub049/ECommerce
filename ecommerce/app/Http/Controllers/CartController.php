<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use Cart;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
// use Darryldecode\Cart\Cart;
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
        $data['attributes']=array($products->image);

        // \Cart::add( $data);
        Cart::add( $data);
        cardArray();
        
        return redirect()->back();
        
    }

    public function delete($id){
        Cart::remove($id);
        return redirect()->back();
    }
}
