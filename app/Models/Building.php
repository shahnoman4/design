<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Building extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'building_name',
        'location_detail',
        'electricity_consunption',
        'image',
    ];

    protected $table= 'building_deatil';

    // protected $casts = [
    //     'business_id' => 'integer',
    // ];
}
