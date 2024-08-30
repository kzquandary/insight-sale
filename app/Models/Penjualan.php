<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $fillable = [
        'id_produk',
        'jumlah',
        'tanggal'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
    
}
