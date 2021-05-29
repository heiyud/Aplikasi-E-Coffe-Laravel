@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
<form action="{{ route('snack.update', [$snack->kd_menu])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <fieldset>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-sm-6">
                                <h1 class="m-0">Ubah Data Menu Lainya</h1>
                            </div><hr>
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <label for="addkd">Kode Menu</label>
                                    <input class="form-control" type="text" name="addkd" value="{{$snack->kd_menu}}" readonly>
                                </div>
                                <div class="col-md-8">
                                    <label for="addnm">Nama Menu</label>
                                    <input id="addnm" type="text" name="addnm" class="form-control" value="{{$snack->nm_menu}}">
                                </div>
                                <div class="col-md-8">
                                    <label for="gambar">Upload Gambar</label>
                                    <input id="gambar" type="file" name="gambar" class="form-control" value="{{$snack->gambar}}">
                                </div>
                                <div class="col-md-8">
                                    <label for="addharga">Harga</label>
                                    <input id="addharga" type="text" name="addharga" class="form-control" value="{{$snack->harga}}">
                                </div>
                            </div>
                        </div>
                        <div class="card-header py-3" align="left">
                            <input type="submit" class="btn btn-success btn-send" value="Update">
                            <a href="{{ route('snack.index') }}">
                                <input type="button" class="btn btn-primary btn-send" value="Kembali">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</form>
@endsection
