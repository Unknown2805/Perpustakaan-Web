@extends('layouts.master')
@section('main')
<div class="card">
    <div class="card-header">
        <h6>Kategori</h6>
    </div>
    <div class="card-body">
        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addKategori">
            Add
        </a>
        <table class="table" id="table1">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Kode</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($kategori as $k)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$k->nama}}</td>
                        <td>{{$k->kode}}</td>
                        <td>
                            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editKategori{{$k->id}}">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusKategori{{$k->id}}">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('admin/kategori/modal')
@endsection
