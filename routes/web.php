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
    Route::get('/bahanbaku/edit/{id}', 'BahanBakuController@edit');
    //Menu
    //Food
    Route::resource('/food', 'FoodController');
    Route::get('/food/hapus/{kd_menu}', 'FoodController@destroy');
    Route::get('/food/edit/{id}', 'FoodController@edit');
    //Drink
    Route::resource('/drink', 'DrinkController');
    Route::get('/drink/hapus/{kd_menu}', 'DrinkController@destroy');
    Route::get('/drink/edit/{id}', 'DrinkController@edit');
     //Snack
    Route::resource('/snack', 'SnackController');
    Route::get('/snack/hapus/{kd_menu}', 'SnackController@destroy');
    Route::get('/snack/edit/{id}', 'SnackController@edit');

});

//Input Pemesanan
Route::resource('/inputpemesanan', 'InputPemesananController');
Route::get('/transaksi', 'InputPemesananController@index')->name('input_pemesanan.transaksi');
Route::post('/sem/store', 'InputPemesananController@store');
Route::get('/transaksi/hapus/{kd_menu}', 'InputPemesananController@destroy');

