<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServicePurchasing extends Model
{
    //use HasFactory, SoftDeletes;

    protected $fillable = [
        'description',
        'cost',
        'inclusive_tax',
        'purchase_tax',
        'number',
        'description',
        'is_sub_account',
        'parent_id',
        'vat_code',
    ];

    protected $table= 'service_purchasing_information';

    protected $casts = [
        'service_id' => 'integer',
        'account_type_id' => 'integer',
        'supplier_id' => 'integer',
    ];
}
