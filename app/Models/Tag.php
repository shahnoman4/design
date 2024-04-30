<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Group;


class Tag extends Model
{
    //use HasFactory, SoftDeletes;

    protected $fillable = [
        'tag_name',
    ];

    protected $table= 'tags';

    protected $casts = [
        'group_id' => 'integer',
    ];

    public function group(){
        return $this->hasOne(Group::Class, 'id','group_id');
    }
}
