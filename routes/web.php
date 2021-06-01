<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['role:admin']], function() {
    // User
    Route::resource('/user','userController');
    Route::get('/user/hapus/{id}','userController@destroy');
    Route::get('/user/edit/{id}','userController@edit');
    Route::get('/profil', 'userController@profil');
    // Supplier
    Route::resource('/supplier', 'SupplierController');
    Route::get('/supplier/hapus/{id}', 'SupplierController@destroy');
    Route::get('/supplier/edit/{id}', 'SupplierController@edit');
      // Barhanbaku
    Route::resource('/bahanbaku', 'BahanBakuController');
    Route::get('/bahanbaku/hapus/{kd_bb}', 'BahanBakuController@destroy');
    Route::get('/bahanbaku/edit/{kd_bb}', 'BahanBakuController@edit');
     //Produk
    Route::resource('/produk', 'ProdukController');
    Route::get('/produk/hapus/{kd_produk}', 'ProdukController@destroy');
    Route::get('/produk/edit/{kd_produk}', 'ProdukController@edit');
    // Pemesanan
    Route::get('/transaksi', 'PemesananController@index')->name('pemesanan.index');
    Route::post('/sem/store', 'PemesananController@store');
    Route::get('/transaksi/hapus/{kd_bb}', 'PemesananController@destroy');
    // Detail Pesan
    Route::post('/detail/simpan', 'DetailPesanController@simpan');
    // Pembelian
    Route::get('/pembelian', 'PembelianController@index')->name('pembelian.transaksi');
    Route::get('/pembelian-beli/{id}', 'PembelianController@edit');
    Route::post('/pembelian/simpan', 'PembelianController@simpan');
    Route::get('/transaksi/hapus/{kd_bb}', 'DetailPembelianController@destroy');
    Route::get('/laporan/faktur/{invoice}', 'PembelianController@pdf')->name('cetak.order_pdf');
    // Retur
    Route::get('/retur','ReturController@index')->name('retur.transaksi');
    Route::get('/retur-beli/{id}', 'ReturController@edit');
    Route::post('/retur/simpan', 'ReturController@simpan');
});

//Order
Route::resource('/Order', 'OrderController');
Route::get('/pos', 'OrderController@index')->name('order.index');
Route::post('/temp/store/{kd_produk}', 'OrderController@store');
Route::get('/pos/del/{kd_produk}', 'OrderController@destroy');
Route::post('/pos/save', 'DetailOrderController@store');

