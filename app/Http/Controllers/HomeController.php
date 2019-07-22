<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['latest_products'] = Product::with(['category','brand'])->where('status','active')->orderBy('id','DESC')->limit(6)->get();
        return view('front.home',$data);
    }
}
