<div class="modal fade" id="addAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Admin</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{url('/admin/anggota/add/admin')}}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-6 col-md-6">
                        <label>FullName</label>
                        <input type="text" name="fullname" class="form-control">
                    </div>
                    <div class="col-6 col-md-6">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-6">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="col-6 col-md-6">
                        <label>Role</label>
                        <input value="Admin" class="form-control" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                            <label>Join date</label>
                            <input value="{{ Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control" disabled>
                    </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save changes</button>
              </div>
        </form>
    </div>
  </div>
</div>

@foreach ($admin as $a)
    <div class="modal fade" id="editAdmin{{$a->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Admin</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('/admin/anggota/edit/admin/'.$a->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <label>Fullname</label>
                            <input type="text" name="fullname" class="form-control" value="{{$a->fullname}}">
                        </div>
                        <div class="col-6 col-md-6">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="{{$a->username}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="col-6 col-md-6">
                            <label>Role</label>
                            <input value="Admin" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                                <label>Join date</label>
                                <input value="{{ Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control" disabled>
                        </div>
                    </div>

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
            </form>

        </div>
        </div>
    </div>
@endforeach

@foreach ($admin as $a)
    <div class="modal fade" id="hapusAdmin{{$a->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Admin</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="{{url('/admin/anggota/delete/admin/'.$a->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <div class="modal-body">
                    <h5>Apakah anda yakin ingin menghapus data ini??</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Save changes</button>
                </div>
            </form>

        </div>
    </div>
    </div>
@endforeach
