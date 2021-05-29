<?php

use Illuminate\Http\Request;
use App\Food;
use App\Drink;
use App\Snack;
use App\Input_Pemesanan;
use App\Temp_Input_Pemesanan;
use Alert;

class DetailInputPemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function simpan(Request $request)
    {
        //Simpan ke table pemesanan
        $tambah_pemesanan=new \App\Input_Pemesanan;
        $tambah_pemesanan->no_pesan = $request->no_pesan;
        $tambah_pemesanan->tgl_pesan = $request->tgl;
        $tambah_pemesanan->nm_pemesan= $request->nm_pemesan;
        $tambah_pemesanan->total = $request->total;
        $tambah_pemesanan->save();

        //SIMPAN DATA KE TABEL DETAIL
        $kd_menu= $request->kd_menu;
        $qty= $request->qty_pesan;
        $sub_total= $request->sub_total;
        foreach($kd_menu as $key => $no)
        {
            $input['no_pesan'] = $request->no_pesan;
            $input['kd_menu'] = $kd_menu[$key];
            $input['qty_pesan'] = $qty[$key];
            $input['sub_total'] = $sub_total[$key];
            DetailPesan::insert($input);
        }
            Alert::success('Pesan', 'Data berhasil disimpan');
            return redirect('/transaksi');

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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
