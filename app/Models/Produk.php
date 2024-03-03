<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaproduk', 'stok','harga_beli','harga_jual', 'id_kategori',
    ];
    protected $table = 'produk';

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori');
    }

}
