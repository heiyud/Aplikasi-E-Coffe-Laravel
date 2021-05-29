<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\Drink;
use App\Snack;
use App\Detail_Input_Pemesanan;
use App\Temp_Input_Pemesanan;
use Alert;

class InputPemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $food=\App\Food::All();
        $drink=\App\Drink::All();
        $snack=\App\Snack::All();
        $temp_input_pemesanan=\App\Temp_Input_Pemesanan::All();

         // No otomatis untuk transaksi pemesanan
        $AWAL = 'POS';
        $bulanRomawi = array("","I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII");
        $noUrutAkhir = \App\Input_Pemesanan::max('no_pesan');
        $no = 1;
        $formatnya=sprintf("%03s", abs((int)$noUrutAkhir + 1)).'/'.$AWAL.'/'.$bulanRomawi[date('n')].'/'.date('Y');
        return view ('pos.pemesanan', ['food' => $food,
                                            'drink' => $drink,
                                            'snack' => $snack,
                                            'no' => $no,
                                            'temp_input_pemesanan' =>$temp_input_pemesanan,
                                            'formatnya' =>$formatnya]);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi jika barang sudah ada tabel temporari maka QTY akan diedit
        if (Temp_Input_pemesanan::where('kd_menu', $request->kd_menu)->exists())
            {
                Alert::warning('Pesan', 'barang sudah ada .. Qty akan terupdate ?');
                Temp_Input_Pemesanan::where('kd_menu',$request->kd_menu)
                            ->update(['qty_pesan' =>1]);
                return redirect('transaksi');
            }
        else
            {
                Temp_Input_Pemesanan::create([
                    'qty_pesan' => 1,
                    'kd_menu' => $request->kd_menu
                ]);
                return redirect('transaksi');
    }
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
    public function destroy($kd_menu)
    {
        //
        $product=\App\Temp_Input_Pemesanan::findorFail($kd_menu);
        $product->delete();
        Alert::success('Pesan', 'Data berhasil dihapus');
        return redirect('transaksi');
    }
}
