<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Alert;
class BahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahanbaku=\App\BahanBaku::All();
        return view('bahanbaku.bahanbaku', ['bahanbaku'=>$bahanbaku]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bahanbaku.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah_bb=new \App\BahanBaku;
        $tambah_bb->kd_bb = $request->addkdbb;
        $tambah_bb->nm_bb = $request->addnmbb;
        $tambah_bb->harga = $request->addharga;
        $tambah_bb->stok = $request->addstok;
        $tambah_bb->save();
        Alert::success('Pesan', 'Data Berhasil Ditambahkan');
        return redirect('/bahanbaku');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bahanbaku = \App\BahanBaku::findOrFail($id);
        return view('bahanbaku.editbahanbaku', ['bahanbaku'=>$bahanbaku]);
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
        $update_bb = \App\BahanBaku::findOrFail ($id);
        $update_bb->kd_bb = $request->addkdbb;
        $update_bb->nm_bb = $request->addnmbb;
        $update_bb->harga = $request->addharga;
        $update_bb->stok = $request->addstok;
        $update_bb->save();
        Alert::success('Update', 'Data Berhasil Diupdate');
        return redirect()->route( 'bahanbaku.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_bb)
    {
        $bahanbaku =\App\BahanBaku::findOrFail($kd_bb);
        $bahanbaku->delete();
        Alert::success('Pesan', 'Data Berhasil Dihapus');
        return redirect()->route('bahanbaku.index');
    }
}
