<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'customer_id',
        'total_price',
        'date',
        'status',
        'payment_status',
        'payment_type',
    ];

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
