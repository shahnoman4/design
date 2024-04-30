<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TransactionDetail extends Model
{
    //use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_id',
        'email',
        'send_later',
        'status',
        'status_by',
        'status_date',
        'billing_address',
        'shipping_address',
        'estimate_date',
        'expiration_date',
        'ship_via',
        'shipping_date',
        'tracking_date',
        'estimate_message',
        'statement_message',
        'sub_total',
        'discount_type',
        'discount',
        'shipping_tax',
        'total',
        'estimate_total',
    ];

    protected $table= 'transaction_details';

    // protected $casts = [
    //     'business_id' => 'integer',
    // ];
}
