<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use Alert;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $food=\App\Food::All();
        return view('Menu.Food.datafood', ['food'=>$food]);
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

            $add_food= new \App\Food;
            $add_food->kd_menu = $request->addkd;
            $add_food->nm_menu = $request->addnm;
            $add_food->gambar = $namaFile;
            $add_food->harga = $request->addharga;

            $nm->move(public_path(). '/img' ,$namaFile);
            $add_food->save();

            Alert::success('Pesan', 'Data Berhasil Ditambahkan');
            return redirect('/food');
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
        $food = \App\Food::findOrFail($id);
        return view('Menu.Food.editfood', ['food'=>$food]);
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

            $update_food = \App\Food::findOrFail ($id);
            $update_food->kd_menu = $request->addkd;
            $update_food->nm_menu = $request->addnm;
            $update_food->gambar = $namaFile;
            $update_food->harga = $request->addharga;

            $nm->move(public_path(). '/img' ,$namaFile);
            $update_food->save();

            Alert::success('Update', 'Data Berhasil Diupdate');
            return redirect()->route( 'food.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_menu)
    {
        $food =\App\Food::findOrFail($kd_menu);
        $food->delete();
        Alert::success('Pesan', 'Data Berhasil Dihapus');
        return redirect()->route('food.index');
    }
}
