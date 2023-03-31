@extends('layouts.user')
@section('main')
<div class="card">
    <div class="card-header">
        <h6>Pesan Masuk</h6>
    </div>
    <div class="card-body">
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
                @foreach ($masuk as $m)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{Auth::user()->fullname}}</td>
                        <td>{{$m->penerima->fullname}}</td>
                        <td>{{$m->judul_pesan}}</td>
                        <td>{{$m->isi_pesan}}</td>
                        <td>{{$m->status}}</td>
                        <td>{{$m->tgl_kirim}}</td>
                        <td>
                            @if ($m->status === 'terkirim')
                            <form action="{{url('/user/pesan/edit/masuk/'.$m->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-success" type="submit">
                                    <i class="bi bi-check"></i>
                                </button>
                            </form>                     
                            @else
                            <span><a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusPesan{{$m->id}}">
                                <i class="bi bi-trash-fill"></i>
                            </a></span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('user/pesan/modalM')
@endsection
