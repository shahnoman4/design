<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Accounts extends Model
{
    //use HasFactory, SoftDeletes;

    protected $fillable = [
        'accout_type',
        'detail_type',
        'detail_description',
        'name',
        'number',
        'description',
        'is_sub_account',
        'parent_id',
        'vat_code',
    ];

    protected $table= 'account_type';

    // protected $casts = [
    //     'customer_id' => 'integer',
    // ];
}
