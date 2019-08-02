<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data['title'] = 'Order List';

        $orders = new Order();
        $orders = $orders->with('customer');
        $orders = $orders->orderBy('id','desc')->paginate(10);

        $data['orders'] = $orders;
        $data['serial'] = managePagination($orders);

        return view('admin.order.index',$data);
    }
    public function show($id)
    {
        $data['title'] = 'Order List';
        $data['order'] = Order::findOrFail($id);
        return view('admin.order.show',$data);
    }

    public function change_status($order_id,$status)
    {
        if($status == 'processing' || $status == 'shipping' || $status == 'delivered' || $status == 'canceled')
        {
            Order::findOrFail($order_id)->update(['status'=>$status]);
            session()->flash('message','Order status updated successfully');
        }
        return redirect()->back();
    }
}
