@extends('layouts.backend.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Search box</h4>
                    <div class="box-controls pull-right">
                        <form>
                            <div class="lookup lookup-circle lookup-right">
                                <input type="text" name="search" value="{{ request()->search }}">
                                <select name="status" id="">
                                    <option value="">Select Status</option>
                                    <option @if(request()->status == 'Active') selected @endif value="Active">Active</option>
                                    <option @if(request()->status == 'Inactive') selected @endif value="Inactive">Inactive</option>
                                </select>
                                <button class="btn btn-sm btn-warning pull-right" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Id</th>
                                <th>Order Number</th>
                                <th>Customer Name</th>
                                <th>Total Amount</th>
                                <th>Payment Status</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $serial++ }}</td>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->customer->first_name.' '.$order->customer->last_name }}</td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ ucfirst($order->payment_status) }}</td>
                                    <td>{{ ucfirst($order->status) }}</td>
                                    <td>
                                        <a href="{{ route('order.show',$order->id) }}" class="btn btn-sm btn-primary">Details</a>
                                        @if($order->status != 'processing')
                                            <a href="{{ route('order.change_status',[$order->id,'processing']) }}" class="btn btn-sm btn-info" onclick="return confirm('Are you confirm to change status?')">Processing</a>
                                        @endif
                                        @if($order->status != 'shipping')
                                            <a href="{{ route('order.change_status',[$order->id,'shipping']) }}" class="btn btn-sm btn-info" onclick="return confirm('Are you confirm to change status?')">Shipping</a>
                                        @endif
                                        @if($order->status != 'delivered')
                                            <a href="{{ route('order.change_status',[$order->id,'delivered']) }}" class="btn btn-sm btn-info" onclick="return confirm('Are you confirm to change status?')">Delivered</a>
                                        @endif
                                        @if($order->status != 'canceled')
                                            <a href="{{ route('order.change_status',[$order->id,'canceled']) }}" class="btn btn-sm btn-info" onclick="return confirm('Are you confirm to change status?')">Canceled</a>
                                        @endif
                                            {{--<form action="{{ route('order.destroy',$order->id) }}" method="post" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you confirm to delete this order?')">Delete</button>
                                        </form>--}}


                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    {{ $orders->render() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection