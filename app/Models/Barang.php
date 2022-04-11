<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "master_barang";
    protected $fillable = ["nama_barang", "harga_satuan"];

    public function transaksi_barang()
    {
        return $this->hasOne(TransaksiBarang::class);
    }
}
