@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
<form action="{{ route('supplier.update', [$supplier->kd_supp])}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <fieldset>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-sm-6">
                                <h1 class="m-0">Ubah Data Supplier</h1>
                            </div><hr>
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <label for="addkdsupp">Kode Supplier</label>
                                    <input class="form-control" type="text" name="addkdsupp" value="{{$supplier->kd_supp}}" readonly>
                                </div>
                                <div class="col-md-8">
                                    <label for="addnmsupp">Nama Supplier</label>
                                    <input id="addnmsupp" type="text" name="addnmsupp" class="form-control" value="{{$supplier->nm_supp}}">
                                </div>
                                <div class="col-md-8">
                                    <label for="alamat">Alamat</label>
                                    <input id="addalamat" type="text" name="addalamat" class="form-control" value="{{$supplier->alamat}}">
                                </div>
                                <div class="col-md-5">
                                    <label for="telepon">No.Telepon/Hp/Kantor</label>
                                    <input id="addtelepon" type="text" name="addtelepon" class="form-control" value="{{$supplier->telepon}}">
                                </div>
                            </div>
                        </div>
                        <div class="card-header py-3" align="left">
                            <input type="submit" class="btn btn-success btn-send" value="Update">
                            <a href="{{ route('supplier.index') }}">
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
