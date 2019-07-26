<?php

namespace App\Http\Controllers\Front;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index($id)
    {
        $data['featured_products'] = Product::with(['category','brand'])->where(['status'=>'active','is_featured'=>1])->orderBy('id','DESC')->limit(6)->get();
        $data['latest_products'] = Product::with(['category','brand'])->where('status','active')->orderBy('id','DESC')->limit(6)->get();
        $data['product'] = Product::with('product_image')->findOrFail($id);
//        dd($data);
        return view('front.product.details',$data);
    }
}
