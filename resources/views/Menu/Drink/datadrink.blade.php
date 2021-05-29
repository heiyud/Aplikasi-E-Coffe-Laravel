@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Menu Minuman </h1>
                </div>
            </div><hr>
            <div class="card">
                <div class="card-header py-3" align="right">
                    <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i>Tambah</button>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="thead-dark">
                    <tr>
                        <th>Kode Menu</th>
                        <th>Nama </th>
                        <th>Gambar </th>
                        <th>Harga </th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($drink as $dr)
                <tr>
                    <td>{{ $dr->kd_menu}}</td>
                    <td>{{ $dr->nm_menu}}</td>
                    <td>
                        <a href="{{ asset ('img/'. $dr->gambar ) }}" target="blank">Lihat Gambar</a>
                    </td>
                    <td>{{ number_format($dr->harga)}}</td>
                    <td align="center"><a href="{{ route('drink.edit',[$dr->kd_menu])}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                            <a href="/drink/hapus/{{$dr->kd_menu}}" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="d-nine d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                        <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal Add Data -->
<div class="modal fade" id="modal-add" tabindex="_1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="model-tittle" id="exampleModalScrollableTitle">Tambah Data Menu Makanan</h5>
                <button type="button" class="close" data-dismis="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ action('DrinkController@store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControllInput1">Kode Menu</label>
                        <input type="text" name="addkd" id="addkd" class="form-control" maxlenght="5" id="exampleFormControllInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControllInput1">Nama Menu</label>
                        <input type="text" name="addnm" id="addnm" id="addnm" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControllInput1">Gambar </label>
                        <input type="file" name="gambar" id="gambar"  class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControllInput1">Harga </label>
                        <input type="number" name="addharga" id="addharga" class="form-control" id="exampleFormControlInput1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Tutup</button>
                    <input type="submit" class="btn btn-primary btn-send" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection




