<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;
    protected $fillable = [
        'diskon', 'totalharga', 'pembayaran', 'tanggalpenjualan', 'userid', 'pelangganid',
    ];
    protected $table = 'penjualan';

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user');
    }
}
