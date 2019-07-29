<?php

namespace App\Http\Controllers\Front;

use App\Customer;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index()
    {
        $data['cart'] = session('cart');
        return view('front.checkout.index',$data);
    }
    public function payment($customer_id,$order_id)
    {
        $data['customer'] = Customer::findOrFail($customer_id);
        $data['order'] = Order::findOrFail($order_id);
        $data['cart'] = session('cart');
        return view('front.checkout.payment',$data);

    }
}
