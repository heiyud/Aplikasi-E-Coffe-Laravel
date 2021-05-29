<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drink;
use Alert;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drink=\App\Drink::All();
        return view('Menu.Drink.datadrink', ['drink'=>$drink]);
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

            $add_drink= new \App\Drink;
            $add_drink->kd_menu = $request->addkd;
            $add_drink->nm_menu = $request->addnm;
            $add_drink->gambar = $namaFile;
            $add_drink->harga = $request->addharga;

            $nm->move(public_path(). '/img' ,$namaFile);
            $add_drink->save();

            Alert::success('Pesan', 'Data Berhasil Ditambahkan');
            return redirect('/drink');
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
        $drink = \App\Drink::findOrFail($id);
        return view('Menu.Drink.editdrink', ['drink'=>$drink]);
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

            $update_drink = \App\Drink::findOrFail ($id);
            $update_drink->kd_menu = $request->addkd;
            $update_drink->nm_menu = $request->addnm;
            $update_drink->gambar = $namaFile;
            $update_drink->harga = $request->addharga;

            $nm->move(public_path(). '/img' ,$namaFile);
            $update_drink->save();

            Alert::success('Update', 'Data Berhasil Diupdate');
            return redirect()->route( 'drink.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_menu)
    {
        $drink =\App\Drink::findOrFail($kd_menu);
        $drink->delete();
        Alert::success('Pesan', 'Data Berhasil Dihapus');
        return redirect()->route('drink.index');
    }
}
