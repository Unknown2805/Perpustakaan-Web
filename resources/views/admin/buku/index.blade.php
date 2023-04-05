@extends('layouts.master')
@section('main')
<div class="card">
    <div class="card-header">
        <h6>Buku</h6>
    </div>
    <div class="card-body">
        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBuku">
            Add
        </a>
        <table class="table" id="table1">
            <thead>
                <th>No</th>
                <th>Gambar Buku</th>
                <th>Kategori</th>
                <th>Penerbit</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
                <th>ISBN</th>
                <th>Buku Baik</th>
                <th>Buku Rusak</th>
                <th>Denda Rusak</th>
                <th>Denda Hilang</th>
                <th>Jumlah Buku</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($buku as $b)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <img src="{{ $b->gambar ? asset($b->gambar) : asset('/images/image.png') }}" alt="" class="card-img" style="width:120px;height:120px">
                        </td>
                        <td>{{$b->kategori->nama}}</td>
                        <td>{{$b->penerbit->nama}}</td>
                        <td>{{$b->judul}}</td>
                        <td>{{$b->pengarang}}</td>
                        <td>{{$b->tahun_terbit}}</td>
                        <td>{{$b->isbn}}</td>
                        <td>{{$b->j_buku_baik}}</td>
                        <td>{{$b->j_buku_rusak}}</td>
                        <td>{{$b->denda_r}}</td>
                        <td>{{$b->denda_h}}</td>
                        <td>{{$b->j_buku_baik + $b->j_buku_rusak}}</td>
                        <td>
                            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editBuku{{$b->id}}">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusBuku{{$b->id}}">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('admin/buku/modal')
@endsection
