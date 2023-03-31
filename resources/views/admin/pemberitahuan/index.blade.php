@extends('layouts.master')
@section('main')
<div class="card">
    <div class="card-header">
        <h6>Pemberitahuan</h6>
    </div>
    <div class="card-body">
        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPemberitahuan">
            Add
        </a>
        <table class="table" id="table1">
            <thead>
                <th>No</th>
                <th>Isi</th>
                <th>Status</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($pemberitahuan as $p)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$p->isi_pemberitahuan}}</td>
                        <td>{{$p->status}}</td>
                        <td>
                            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editPemberitahuan{{$p->id}}">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusPemberitahuan{{$p->id}}">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('admin/pemberitahuan/modal')
@endsection
