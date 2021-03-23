<?php

namespace App;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'id_barang', 'jumlah', 'harga'
    ];

    protected $hidden = [

    ];

    public function barang(){
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }
}
