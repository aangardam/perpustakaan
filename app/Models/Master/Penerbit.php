<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $fillable = ['name','address','phone','city','email'];
}
