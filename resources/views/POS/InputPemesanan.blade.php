@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h3 mb-0 text-gray-800">Transaksi Pemesanan </h1>
                </div>
            </div><hr>
<form action="/detail/simpan" method="POST">
    @csrf
    <div class="form-group col-sm-4">
        <label for="exampleFormControlInput1">No Faktur</label>
        <input type="text" name="no_pesan" value="{{ $formatnya }}" class="form-control" id="exampleFormControlInput1">
    </div>
    <div class="form-group col-sm-4">
        <label for="exampleFormControlInput1">Tanggal Transaksi</label>
        <input id="tgl_kirim" type="text" name="tgl_kirim" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly='readonly'>
    </div>
    <div class="card-header py-3" align="right">
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#exampleModalScrollable">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Menu</button>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Kode Menu</th>
                            <th>Nama Menu</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($total = 0)
                        @foreach($temp_input_pemesanan as $temp)
                        <tr>
                            <td><input name="kd_menu[]" class="form-control" type="hidden" value="{{$temp->kd_menu}}" readonly>{{ $temp->kd_menu}}</td>
                            <td><input name="nama_menu" class="form-control" type="hidden" value="{{$temp->nm_menu}}" readonly>{{$temp->nm_menu}}</td>
                            <td><input name="qty_pesan[]" class="form-control" type="hidden" value="{{$temp->qty_pesan}}" readonly>{{$temp->qty_pesan}}</td>
                            <td><input name="sub_total[]" class="form-control" type="hidden" value="{{$temp->sub_total}}" readonly>{{$temp->sub_total}}</td>
                            <td align="center">
                                <a href="/transaksi/hapus/{{$temp->kd_menu}}" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus</a>
                            </td>
                        </tr>
                        @php($total += $temp->sub_total)
                        @endforeach
                        <tr>
                            <td colspan="3"></td>
                            <td><input name="total" class="form-control" type="hidden" value="{{$total}}">Total {{ number_format($total) }}</a>
                            <td></td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <input type="submit" class="btn btn-primary btn-send" value="Simpan Pemesanan">
        </div>
    </div>
</form>

<!--Modal Tambah Barang-->
<div class="modal fade" id="exampleModalScrollable" tabindex="_1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="model-tittle" id="exampleModalScrollableTitle">Tambah Barang</h5>
                <button type="button" class="close" data-dismis="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/sem/store" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Barang</label>
                        <select name="brg" id="kd_brg select2" class="form-control" required width="100%">
                            <option value="">Pilih</option>
                                @foreach ($food as $product)
                                <option value="{{ $product->kd_menu }}">{{ $product->kd_menu}} - {{ $product->nm_menu }} [{{ number_format($product->harga) }}]</option>
                                @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">QTY</label>
                    <input type="number" min="1" name="qty" id="addnmbrg" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
                <input type="submit" class="btn btn-primary btn-send" value="Tambah Barang">
            </div>
            </form>
        </div>
    </div>
</div>
@endsection




