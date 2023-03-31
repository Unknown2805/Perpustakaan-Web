@extends('layouts.master')
@section('main')
    <div class="row">
        <div class="col-12 col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4>Form Identitas</h4>
                </div>
                @foreach ($identitas as $i)
                <div class="card-body">
                    <form action="{{url('/admin/identitas/edit/'.$i->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-6 col-md-6">
                                <label>Nama App</label>
                                <input type="text" name="nama_app" class="form-control" value="{{$i->nama_app}}">
                            </div>
                            <div class="col-6 col-md-6">
                                <label>Email App</label>
                                <input type="text" name="email_app" class="form-control"value="{{$i->email_app}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" rows="4" cols="8">{{$i->alamat}}</textarea>
                            </div>
                            <div class="col-6 col-md-6">
                                <label>Nomor HP App</label>
                                <input type="text" name="nomor_hp" class="form-control" value="{{$i->nomor_hp}}">
                                <label class="mt-2">Foto/Gambar</label>
                                <input type="file" name="gambar" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <button type="submit" class="btn btn-primary mt-3 w-100">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-12 col-md-5">
            <div class="card">
                <div class="card-header">
                    <img src="{{ $i->gambar ? asset($i->gambar) : asset('/images/image.png') }}" alt="" class="card-img w-100" style="height:200px">
                </div>
                <div class="card-body">
                    <p>Nama App: {{$i->nama_app}}</p>
                    <p>Email App: {{$i->email_app}}</p>
                    <p>Nomor HP App: {{$i->nomor_hp}}</p>
                    <p>Alamat App</p>
                    <textarea class="form-control" rows="3" cols="8" disabled>{{$i->alamat}}</textarea >

                </div>
            </div>
        </div>
    </div>
@endsection
