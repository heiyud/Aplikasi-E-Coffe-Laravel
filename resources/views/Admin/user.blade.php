@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pengguna</h1>
                </div>
            </div><hr>
            <div class="card">
                <div class="card-header py-3" align="right">
                    <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i>Tambah</button>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                                <tr align="center">
                                    <th width="5%">User Id</th>
                                    <th width="25%">Nama</th>
                                    <th width="20%">Email</th>
                                    <th width="15%">Roles/Akses</th>
                                    <th width="25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    @foreach ($row->roles as $r)
                                    <td>
                                        {{$r->id}}
                                    </td>
                                    @endforeach
                                    <td align="center">
                                        <a href="{{route('user.edit',[$row->id])}}" class="d-none d-sm-inline-block btn btn-success shadow-sm">
                                            <i class="fas fa-edit fa-sm text-white-50"></i> Edit Access
                                        </a>
                                        <a href="/user/hapus/{{ $row->id}}" onclick="return confirm('Yakin Ingin Menghapus Data?' )" class="d-none d-sm-inline-block btn btn-danger shadow-sm">
                                            <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- modal add data -->
<div class="modal inmodal fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <form name="frm_add" id="frm_add" class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-tittle">Tambah Data User</h4>
            </div>
            <div class="modal-body">
                <div class="form-group"><label class="col-ld-20 control-label">Nama User</label>
                    <div class="col-lg-10"><input type="text" id="username" name="username" required class="form-control"></div>
                    <div class="form-group"><label class="col-lg-20 control-label">Email User</label>
                        <div class="col-lg-10"><input type="text" id="email" name="email" required class="form-control"></div>
                        <div class="form-group"><label class="col-lg-20 control-label">Roles/Akses</label>
                            <select id="roles" name="roles" class="form-control" required>
                                <option value="">--Pilih Roles--</option>
                                <option value="ADMIN">Admin</option>
                                <option value="USER">User</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
            </div>
        </form>
    </div>
</div>

@endsection


