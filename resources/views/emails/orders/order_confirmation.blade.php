@component('mail::message')
# Order Id - {{ $order->order_number }}

Dear Customer,

Thanks for your order. Order has been placed successfully.

Your total payable amount is {{ $order->total_price }}/-.

Order details

<table>
    <tr>
        <th>Product Name</th>
        <th>Unit Price</th>
        <th>Quantity</th>
        <th>Total</th>
    </tr>
    @foreach($order->order_detail as $item)
        <tr>
            <td>{{ $item->product_name }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->total }}</td>
        </tr>
    @endforeach
    <tr>
        <th colspan="3">Total</th>
        <td>{{ $order->total_price }}</td>
    </tr>
</table>



@component('mail::button', ['url' => route('payment',[$order->customer_id,$order->id])])
Payment
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
