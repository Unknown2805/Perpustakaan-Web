@extends('layouts.user')
@section('main')
<div class="card">
    <div class="card-header">
        <h6>Peminjaman</h6>
    </div>
    <div class="card-body">
        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPeminjaman">
            Add
        </a>
        <table class="table" id="table1">
            <thead>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Kondisi saat dipinjam</th>
                <th>Kondisi saat dikembalikan</th>
                <th>Denda</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($peminjaman as $p)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$p->user->fullname}}</td>
                        <td>{{$p->buku->judul}}</td>
                        <td>{{$p->tgl_peminjaman}}</td>
                        <td>{{$p->tgl_pengembalian}}</td>
                        <td>{{$p->kondisi_buku_saat_dipinjam}}</td>
                        @if ($p->kondisi_buku_saat_dikembalikan === null)
                        <td>Belum dikembalikan</td>
                        @else
                        <td>{{$p->kondisi_buku_saat_dikembalikan}}</td>
                        @endif
                        @if ($p->denda === null)
                        <td>Tidak ada</td>
                        @else
                        <td>{{$p->denda}}</td>
                        @endif
                        @if ($p->kondisi_buku_saat_dikembalikan === null)
                        <td>
                            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#kembali{{$p->id}}">
                                Kembalikan
                            </a>
                        </td>
                        @else
                        <td>
                            <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#">
                                Dikembalikan
                            </a>                        
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('user/peminjaman/modal')
@endsection
