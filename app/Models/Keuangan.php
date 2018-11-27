<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $fillable = ['price','note','iddenda'];

    public function trans()
    {
    	 return $this->belongsTo('App\Models\Master\Denda','iddenda');
    }
}
