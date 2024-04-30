<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Service extends Model
{
    //use HasFactory, SoftDeletes;

    protected $fillable = [
        'service_type',
        'name',
        'service_code',
        'category_id',
        'description',
        'sales_price',
        'account_type_id',
        'inclusive_of_vat',
        'vat',
        'purchasing_information',
        'image',
    ];

    protected $table= 'services';

    // protected $casts = [
    //     'customer_id' => 'integer',
    // ];
}
