@extends('layouts.master')
@section('main')
<div class="card">
    <div class="card-header">
        <h6>Admins</h6>
    </div>
    <div class="card-body">
        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdmin">
            Add
        </a>
        <table class="table" id="table1">
            <thead>
                <th>No</th>
                <th>Fullname</th>
                <th>Username</th>
                <th>Password</th>
                <th>terakhir_login</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($admin as $a)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$a->fullname}}</td>
                        <td>{{$a->username}}</td>
                        <td>{{($a->password)}}</td>
                        <td>{{$a->terakhir_login}}</td>
                        <td>
                            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editAdmin{{$a->id}}">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusAdmin{{$a->id}}">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('admin/anggota/modalA')
@endsection
