@extends('layouts.user')
@section('main')
<div class="card">
    <div class="card-header">
        <h6>Pesan Keluar</h6>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-end">
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPesan">
                Kirim pesan <span><i class="bi bi-send-fill"></i></span>
            </a>
        </div>
        <table class="table" id="table1">
            <thead>
                <th>No</th>
                <th>Pengirim</th>
                <th>Penerima</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($keluar as $k)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{Auth::user()->fullname}}</td>
                        <td>{{$k->penerima->fullname}}</td>
                        <td>{{$k->judul_pesan}}</td>
                        <td>{{$k->isi_pesan}}</td>
                        <td>{{$k->status}}</td>
                        <td>{{$k->tgl_kirim}}</td>
                        <td>
                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusPesan{{$k->id}}">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('user/pesan/modal')
@endsection
