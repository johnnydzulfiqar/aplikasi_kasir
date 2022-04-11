<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $barang = DB::table('master_barang')->get();

        return view('barang.index', ['barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
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
                'nama_barang' => 'required',
                'harga_satuan' => 'required',

            ],
            [
                'nama_barang.required' => 'Tolong Isi',
                'harga_satuan' => 'Tolong Isi',

            ]
        );

        $barang =  new Barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_satuan = $request->harga_satuan;


        $barang->save();


        return redirect('/barang');
        Barang::create([
            'nama_barang' => $request->nama_barang,

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::findOrfail($id);
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = DB::table('master_barang')->where('id', $id)->first();

        return view('barang.edit', compact('barang'));
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
                'nama_barang' => 'required',
                'harga_satuan' => 'required',

            ],
            [
                'nama_barang.required' => 'Tolong Isi',
                'harga_satuan' => 'Tolong Isi',

            ]
        );

        DB::table('master_barang')->where('id', $id)->update(
            [
                'nama_barang' => $request['nama_barang'],
                'harga_satuan' => $request['harga_satuan'],
            ]
        );

        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);


        $barang->delete();
        return redirect('/barang');
    }
}
