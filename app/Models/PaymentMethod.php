<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PaymentMethod extends Model
{
    //use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'is_credit_or_debit_card',
    ];

    protected $table= 'payment_method';

    // protected $casts = [
    //     'business_id' => 'integer',
    // ];
}
