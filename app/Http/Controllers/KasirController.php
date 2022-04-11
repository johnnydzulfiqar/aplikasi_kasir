<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\TransaksiPembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        $barang = Barang::all();
        return view('kasir.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('kasir.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                'jumlah' => 'required|numeric',
                'master_barang_id' => 'required',

            ],
            [
                'pertanyaan.required' => 'Tolong Isi',
                'master_barang_id' => 'Tolong Isi',

            ]
        );
        $transaksi =  new Transaksi;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->master_barang_id = $request->master_barang_id;
        // $transaksi->harga_satuan = $request->harga_satuan;

        // $transaksi->transaksi_pembelian_id = $request->transaksi_pembelian_id;
        $transaksi->save();


        return redirect('/kasir');
        Transaksi::create([
            'jumlah' => $request->jumlah,

        ]);



        return redirect('/kasir');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::findOrfail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrfail($id);
        $barang = Barang::all();
        return view('transaksi.edit', compact('transaksi', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'jumlah' => 'required|numeric',
                'master_barang_id' => 'required',

            ],
            [
                'pertanyaan.required' => 'Tolong Isi',
                'master_barang_id' => 'Tolong Isi',
            ]
        );

        $transaksi =  new Transaksi;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->master_barang_id = $request->master_barang_id;

        $transaksi->save();

        $transaksi->save();
        return redirect('/transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);


        $transaksi->delete();
        return redirect('/transaksi');
    }
}
