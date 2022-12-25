<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use Darryldecode\Cart\Cart;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $units=Unit::all();
        $sizes=Size::all();
        $colors=Color::all();
        $products=Product::where('status',1)->latest()->limit(12)->get();

        return view('frontend.welcome', compact('categories','subcategories','brands','units','sizes','colors','products'));
    }

    public function view_details($id)
        {
            $categories=Category::all();
            $subcategories=SubCategory::all();
            $brands=Brand::all();
            $units=Unit::all();
            $product=Product::findOrFail($id);
            $sizes=Size::find($product->size_id);
            $colors=Color::find($product->color_id);
            $cat_id=$product->cat_id;
            $related_products=Product::where('cat_id',$cat_id)->limit(4)->get();

            return view('frontend.pages.view_details', compact('categories','subcategories','brands','units','sizes','colors','product','related_products'));
            
        }

    public function product_by_cat($id)
        {
            $categories=Category::all();
            $subcategories=SubCategory::all();
            $brands=Brand::all();
            $products=Product::where('status',1)->where('cat_id',$id)->limit(12)->get();
            return view('frontend.pages.product_by_cat',compact('categories','subcategories','brands','products'));
            
        }

    public function product_by_subcat($id)
        {
            $categories=Category::all();
            $subcategories=SubCategory::all();
            $brands=Brand::all();
            $products=Product::where('status',1)->where('subcat_id',$id)->limit(12)->get();
            return view('frontend.pages.product_by_subcat',compact('categories','subcategories','brands','products'));
            
        }

        public function product_by_brand($id)
        {
            $categories=Category::all();
            $subcategories=SubCategory::all();
            $brands=Brand::all();
            $products=Product::where('status',1)->where('br_id',$id)->limit(12)->get();
            return view('frontend.pages.product_by_brand',compact('categories','subcategories','brands','products'));
            
        }
}
