<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['idbuku','idmember','kodepinjam','kodekembali','tgl','status','denda'];

    public function buku(){
        return $this->belongsTo('App\Models\Master\Buku','idbuku');
    }

    public function member(){
        return $this->belongsTo('App\Models\Master\Member','idmember');
    }
}
