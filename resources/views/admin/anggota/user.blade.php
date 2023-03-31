@extends('layouts.master')
@section('main')
<div class="card">
    <div class="card-header">
        <h6>Users</h6>
    </div>
    <div class="card-body">
        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
            Add
        </a>
        <table class="table" id="table1">
            <thead>
                <th>No</th>
                <th>Kode Anggota</th>
                <th>NIS</th>
                <th>Fullname</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($user as $u)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$u->kode_user}}</td>
                        <td>{{($u->nis)}}</td>
                        <td>{{$u->fullname}}</td>
                        <td>{{$u->kelas}}</td>
                        <td>{{$u->alamat}}</td>
                        <td>
                            @if ($u->verif === null)
                            <form action="{{url('/admin/anggota/verif/user/'.$u->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="verified">
                                <button type="submit" class="btn btn-warning">Verif</button>
                            </form>
                            @else
                            <p class="text-success" style="font-weight:bold">{{$u->verif}}</p>
                            @endif
                        </td>
                        <td>

                            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editUser{{$u->id}}">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusUser{{$u->id}}">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('admin/anggota/modalU')
@endsection
