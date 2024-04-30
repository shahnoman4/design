<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Group extends Model
{
    //use HasFactory, SoftDeletes;

    protected $fillable = [
        'group_name',
    ];

    protected $table= 'groups';

}
