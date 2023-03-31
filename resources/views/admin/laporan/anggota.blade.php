@extends('layouts.master')
@section('main')
    <div class="card">
        <div class="card-header">
            <h6>Laporan Semua Anggota</h6>
        </div>
        <div class="card-body">
            <a class="btn btn-danger me-3" data-bs-toggle="modal" data-bs-target="#pdfAnggota">
                <i class="bi bi-file-pdf-fill"></i> PDF
            </a>
            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#excelAnggota">
                <i class="bi bi-file-earmark-spreadsheet-fill"></i> Excel
            </a>
            <table class="table" id="table1">
                <thead>
                    <th>No</th>
                    <th>Role</th>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Join Date</th>
                    <th>terakhir_login</th>
                </thead>
                <tbody>
                    @foreach ($user as $u)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$u->role}}</td>
                            <td>{{$u->fullname}}</td>
                            <td>{{$u->username}}</td>
                            <td>{{$u->join_date}}</td>
                            <td>{{$u->terakhir_login}}</td>                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@include('admin.laporan.modala')
@endsection
