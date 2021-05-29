@extends('layouts.layout')
@include('sweetalert::alert')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-8">
                    <div class="card" style="min-height:85vh">
                        <div class="card-header bg-white">
                            <form action="/sem/store" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="font-weight-bold">Pilih Menu</h4>
                                    </div>
                                    <div class="col text-right">
                                        <select name="" id="" class="form-control from-control-sm" style="font-size: 12px">
                                            <option value="" holder>Filter Category</option>
                                            <option value="1">All Category...</option>
                                        </select>
                                    </div>
                                    <div class="col"><input type="text" name="search"
                                            class="form-control form-control-sm col-sm-12 float-right"
                                            placeholder="Search Product..." onblur="this.form.submit()"></div>
                                    <div class="col-sm-3"><button type="submit"
                                            class="btn btn-primary btn-sm float-right btn-block">Cari Menu</button></div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <h5>Daftar Makanan</h5>
                            <hr>
                            <div class="row">
                                @foreach ($food as $product)
                                <div style="width: 16.66%;border:1px solid rgb(243, 243, 243)" class="mb-4">
                                    <div class="card-img-top">
                                        <div class="view overlay">
                                            <form action="/sem/store" method="POST">
                                                @csrf
                                                <img class="card-img-top gambar" src="{{ asset('img/'. $product->gambar) }}"  srcset=""
                                                    alt="Card image cap" style="cursor: pointer"
                                                    onclick="this.closest('form').submit();return false;">
                                                <button type="submit" class="btn btn-primary btn-sm cart-btn"><i
                                                        class="fas fa-cart-plus"></i></button>
                                        </div>
                                        <div class="card-body">
                                            <label class="card-text text-center font-weight-bold"
                                                style="text-transform: capitalize;">
                                                {{ Str::words($product->kd_menu) }}</label>
                                            <label class="card-text text-center font-weight-bold"
                                                style="text-transform: capitalize;">
                                                {{ Str::words($product->nm_menu,4) }}</label>
                                            <p class="card-text text-center">Rp. {{ number_format($product->harga,2,',','.') }}
                                            </p>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <h5>Daftar Minuman</h5>
                            <hr>
                            <div class="row">
                                @foreach ($drink as $drink)
                                <div style="width: 16.66%;border:1px solid rgb(243, 243, 243)" class="mb-4">
                                    <div class="productCard">
                                        <div class="view overlay">
                                            <form action="/sem/store" method="POST">
                                                @csrf
                                                <img class="card-img-top gambar" src="{{ asset('img/'. $drink->gambar) }}"  srcset=""
                                                    alt="Card image cap" style="cursor: pointer"
                                                    onclick="this.closest('form').submit();return false;">
                                                <button type="submit" class="btn btn-primary btn-sm cart-btn"><i
                                                        class="fas fa-cart-plus"></i></button>
                                            </form>
                                        </div>
                                        <div class="card-body">
                                            <label class="card-text text-center font-weight-bold"
                                                style="text-transform: capitalize;">
                                                {{ Str::words($drink->nm_menu,4) }}</label>
                                            <p class="card-text text-center">Rp. {{ number_format($drink->harga,2,',','.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <h5>Daftar Lainya</h5>
                            <hr>
                            <div class="row">
                                @foreach ($snack as $others)
                                <div style="width: 16.66%;border:1px solid rgb(243, 243, 243)" class="mb-4">
                                    <div class="productCard">
                                        <div class="view overlay">
                                                <form action="/sem/store" method="POST">
                                                @csrf
                                                <img class="card-img-top gambar" src="{{ asset('img/'. $others->gambar) }}"  srcset=""
                                                    alt="Card image cap" style="cursor: pointer"
                                                    onclick="this.closest('form').submit();return false;">
                                                <button type="submit" class="btn btn-primary btn-sm cart-btn"><i
                                                        class="fas fa-cart-plus"></i></button>
                                            </form>
                                        </div>
                                        <div class="card-body">
                                            <label class="card-text text-center font-weight-bold"
                                                style="text-transform: capitalize;">
                                                {{ Str::words($others->nm_menu,4) }}</label>
                                            <p class="card-text text-center">Rp. {{ number_format($others->harga,2,',','.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card" style="min-height:85vh">
                        <div class="card-header bg-white">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h4 class="font-weight-bold">Cart</h4>
                                </div>
                                <div class="col-sm-8">
                                    <select name="" id="" class="form-control from-control-sm" style="font-size: 13px">
                                        <option value="1">Take Away Customer</option>
                                        <option value="" holder>Other Customer...</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <form action="/detail/simpan" method="POST">
                                        @csrf
                                    <label for="exampleFormControlInput1">No Pesanan</label>
                                    <input type="text" name="no_pesan" value="{{ $formatnya }}" class="form-control" id="exampleFormControlInput1" readonly='readonly'>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="exampleFormControlInput1">Tanggal</label>
                                    <input id="tgl_kirim" type="text" name="tgl_kirim" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly='readonly'>
                                </div>
                                <div class="form-group col-sm-9">
                                    <label for="exampleFormControlInput1">Nama Pemesan</label>
                                    <input id="nm_pemesan" type="text" name="nm_pemesan" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="overflow-y:auto;min-height:53vh;max-height:53vh" class="mb-3">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th width="10%">No</th>
                                            <th width="40%">Nama Product</th>
                                            <th width="25%">Qty</th>
                                            <th width="25%" class="text-right">Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($temp_input_pemesanan as $temp)
                        <tr>
                            <td>{{$no++}} <br><a onclick="this.closest('form').submit();return false;"></a></td>
                            <td><input name="nama_menu" class="form-control" type="hidden" value="{{$temp->nm_menu}}" readonly>{{$temp->nm_menu}}</td>
                            <td><input name="qty_pesan[]" class="form-control" type="hidden" value="{{$temp->qty_pesan}}">{{number_format($temp->qty_pesan)}}</td>
                            <td><input name="sub_total[]" class="form-control" type="hidden" value="{{$temp->sub_total}}" readonly>{{$temp->sub_total}}</td>
                        </tr>
                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <th width="60%">Sub Total</th>
                                    <th width="40%" class="text-right">Rp.  </th>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <form action="{{ url('/transcation') }}" method="get">
                                            PPN 10%
                                        </form>
                                    </th>
                                    <th class="text-right">Rp.
                                    </th>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <th class="text-right font-weight-bold">Rp.
                                        </th>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="col-sm-4">
                                    <form action="/transaksi/hapus/{kd_menu}" method="GET">
                                        @csrf
                                        <button class="btn btn-info btn-lg btn-sm btn-block" style="padding:1rem!important"
                                            onclick="return confirm('Apakah anda yakin ingin meng-clear cart ?');"
                                            type="submit">Hapus</button>
                                    </form>
                                </div>
                                <div class="col-sm-4">
                                    <button class="btn btn-success btn-sm btn-lg btn-block" style="padding:1rem!important" type="submit">Bayar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
