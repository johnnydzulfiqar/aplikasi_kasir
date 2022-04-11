<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barang = Barang::create([
            'nama_barang' => 'Sabun batang',
            'harga_satuan' => '3000',

        ]);
        $barang = Barang::create([
            'nama_barang' => 'Mi Instan',
            'harga_satuan' => '2000',

        ]);
        $barang = Barang::create([
            'nama_barang' => 'Pensil',
            'harga_satuan' => '1000',

        ]);
        $barang = Barang::create([
            'nama_barang' => 'Kopi sachet',
            'harga_satuan' => '1500',

        ]);
        $barang = Barang::create([
            'nama_barang' => 'Air minum galon',
            'harga_satuan' => '20000',

        ]);
    }
}
