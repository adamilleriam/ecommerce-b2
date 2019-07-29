<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'street_address',
        'district',
        'zip',
        'phone',
        'email',
    ];
}
