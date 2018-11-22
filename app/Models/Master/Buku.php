<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buku extends Model
{
    use SoftDeletes;
    protected $fillable = ['kode','name','idkategori','idpenerbit','pengarang','stok'];

    public function kategori(){
        return $this->belongsTo('App\Models\Master\Kategori','idkategori');
    }

    public function penerbit(){
        return $this->belongsTo('App\Models\Master\Penerbit','idpenerbit');
    }

    protected $dates = ['deleted_at'];
}
