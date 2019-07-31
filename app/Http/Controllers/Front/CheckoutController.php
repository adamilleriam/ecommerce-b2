<?php

namespace App\Http\Controllers\Front;

use App\Customer;
use App\Library\SslCommerz\SslCommerzNotification;
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
    public function payment_gateway($order_id)
    {
        $data['order'] = Order::findOrFail($order_id);
        $data['customer'] = Customer::findOrFail($data['order']->customer_id);
        $this->_sslCommerz($data);
    }
    private function _sslCommerz($data)
    {
        $post_data = array();
        $post_data['total_amount'] = $data['order']->total_price; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $data['customer']->first_name.' '.$data['customer']->last_name;
        $post_data['cus_email'] = $data['customer']->email;
        $post_data['cus_add1'] = $data['customer']->street_address;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = $data['customer']->district;
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = $data['customer']->zip;
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $data['customer']->phone;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = $data['customer']->first_name.' '.$data['customer']->last_name;
        $post_data['ship_add1'] = $data['customer']->street_address;
        $post_data['ship_add2'] = "";
        $post_data['ship_city'] = $data['customer']->district;
        $post_data['ship_state'] = "";
        $post_data['ship_postcode'] = $data['customer']->zip;
        $post_data['ship_phone'] = $data['customer']->phone;
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "N/A";
        $post_data['product_name'] = "N/A";
        $post_data['product_category'] = "N/A";
        $post_data['product_profile'] = "N/A";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = $data['order']->id;
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');
        dd($payment_options->status);
        dd($post_data);
    }
    public function success(Request $request)
    {
        $order = Order::findOrFail($request->value_a);
        $order->payment_status = 'paid';
        $order->payment_type = 'card';
        $order->payment_info = json_encode($request);
        $order->save();

        $data['order'] = $order;
        $data['customer'] = Customer::findOrFail($order->customer_id);
        $data['cart'] = session('cart');

        session()->flash('success','Payment successful');
        return view('front.checkout.payment',$data);
    }
}
