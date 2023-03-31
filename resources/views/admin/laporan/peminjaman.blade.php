@extends('layouts.master')
@section('main')


<div class="card">
    <div class="card-header">
        <h6>Peminjaman</h6>
    </div>
    <div class="card-body">
        <a class="btn btn-danger me-3" data-bs-toggle="modal" data-bs-target="#pdfPeminjaman">
            <i class="bi bi-file-pdf-fill"></i> PDF
        </a>
        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#excelPeminjaman">
            <i class="bi bi-file-earmark-spreadsheet-fill"></i> Excel
        </a>
        <table class="table" id="table1">
            <thead>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Kondisi saat dipinjam</th>
                <th>Status</th>
            </thead>
            <tbody>
                @foreach ($peminjaman as $p)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$p->user->fullname}}</td>
                        <td>{{$p->buku->judul}}</td>
                        <td>{{$p->tgl_peminjaman}}</td>
                        <td>{{$p->kondisi_buku_saat_dipinjam}}</td>               
                        <td>Dipinjam</td>
                    </tr>
                @endforeach
            </tbody>
        </table> 
    </div>
</div>
@include('admin.laporan.modal')
@endsection
