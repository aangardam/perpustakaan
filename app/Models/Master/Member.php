<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    protected $fillable = ['nomor','name','address','email','phone','foto','tgl_lahir','tmpt_lahir','expired','status'];

    protected $dates = ['deleted_at'];
}
