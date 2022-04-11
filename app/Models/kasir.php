<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    protected $table = "transaksi_pembelian_barang";
    protected $fillable = ["transaksi_pembelian_id", "master_barang_id", "jumlah", "harga_satuan"];

    public function transaksi_pembelian()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_pembelian_id');
    }
    public function master_barang()
    {
        return $this->belongsTo(Barang::class, 'master_barang_id');
    }
}
