<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Address;

class Customer extends Model
{
    //use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'company_name',
        'customer_display_name',
        'email',
        'phone_no',
        'mobile_no',
        'fax',
        'other',
        'website',
        'is_sub_customer',
        'bill_for_parent',
        'notes',
        'attachment',
        'payment_terms',
        'sales_delivery_option',
        'use_language',
        'vat_reg_no',
        'utr_no',
        'opening_no',
        'ask_of_date',
    ];

    protected $table= 'customers';

    protected $casts = [
        'parent_id' => 'integer',
        'payment_method_id' => 'integer',
    ];

    public function billingAddress(){
        return $this->hasOne(Address::Class, 'customer_id')->where('address_type','Billing');
    }

    public function shippingAddress(){
        return $this->hasOne(Address::Class, 'customer_id')->where('address_type','Billing');
    }

    public function scopeWithAddress($query){
        $query->with([
            'billingAddress', 'shippingAddress'
        ]);
    }
}
