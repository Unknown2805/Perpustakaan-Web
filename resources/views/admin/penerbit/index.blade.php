@extends('layouts.master')
@section('main')
<div class="card">
    <div class="card-header">
        <h6>Penerbit</h6>
    </div>
    <div class="card-body">
        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPenerbit">
            Add
        </a>
        <table class="table" id="table1">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Kode</th>
                <th>Verif</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($penerbit as $p)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$p->nama}}</td>
                        <td>{{$p->kode}}</td>
                        <td>{{$p->verif_penerbit}}</td>
                        <td>
                            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editPenerbit{{$p->id}}">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusPenerbit{{$p->id}}">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('admin/penerbit/modal')
@endsection
