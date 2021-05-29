<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Snack;
use Alert;

class SnackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $snack=\App\Snack::All();
        return view('Menu.Snack.datasnack', ['snack'=>$snack]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nm = $request->gambar;
        $namaFile = $nm->getClientOriginalName();

            $add_snack= new \App\Snack;
            $add_snack->kd_menu = $request->addkd;
            $add_snack->nm_menu = $request->addnm;
            $add_snack->gambar = $namaFile;
            $add_snack->harga = $request->addharga;

            $nm->move(public_path(). '/img' ,$namaFile);
            $add_snack->save();

            Alert::success('Pesan', 'Data Berhasil Ditambahkan');
            return redirect('/snack');
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
        $snack = \App\Snack::findOrFail($id);
        return view('Menu.Snack.editsnack', ['snack'=>$snack]);
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
        $nm = $request->gambar;
        $namaFile = $nm->getClientOriginalName();

            $update_snack= \App\Snack::findOrFail ($id);
            $update_snack->kd_menu = $request->addkd;
            $update_snack->nm_menu = $request->addnm;
            $update_snack->gambar = $namaFile;
            $update_snack->harga = $request->addharga;

            $nm->move(public_path(). '/img' ,$namaFile);
            $update_snack->save();

            Alert::success('Update', 'Data Berhasil Diupdate');
            return redirect()->route( 'snack.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_menu)
    {
        $snack =\App\Snack::findOrFail($kd_menu);
        $snack->delete();
        Alert::success('Pesan', 'Data Berhasil Dihapus');
        return redirect()->route('snack.index');
    }
}
