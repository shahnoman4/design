<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    //use HasFactory, SoftDeletes;

    protected $fillable = [
        'street_address',
        'city',
        'county',
        'post_code',
        'country',
        'address_type',
    ];

    protected $table= 'address';

    protected $casts = [
        'customer_id' => 'integer',
    ];
}
