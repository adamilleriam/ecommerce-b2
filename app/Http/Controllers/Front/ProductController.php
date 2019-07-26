<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index($category_id = false)
    {
        $products = new Product();
        $products = $products->with(['brand','category','product_image']);
        if($category_id != false){
            $products = $products->where('category_id',$category_id);
        }
        $products = $products->where('status','active');
        $products = $products->orderBy('id','DESC')->paginate(6);
        $data['products'] = $products;
        return view('front.product.index',$data);
    }
    public function details($id)
    {
        $data['featured_products'] = Product::with(['category','brand'])->where(['status'=>'active','is_featured'=>1])->orderBy('id','DESC')->limit(6)->get();
        $data['latest_products'] = Product::with(['category','brand'])->where('status','active')->orderBy('id','DESC')->limit(6)->get();
        $data['product'] = Product::with('product_image')->findOrFail($id);
//        dd($data);
        return view('front.product.details',$data);
    }
}
