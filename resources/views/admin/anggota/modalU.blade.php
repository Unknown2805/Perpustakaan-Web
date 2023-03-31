  <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <form action="{{url('/admin/anggota/add/user')}}" method="POST">
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
                          <label>Join date</label>
                          <input value="{{ Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control" disabled>
                      </div>
                      <div class="col-6 col-md-6">
                          <label>Role</label>
                          <input value="User" class="form-control" disabled>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-6 col-md-6">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control">
                      </div>
                      <div class="col-6 col-md-6">
                              <label>NIS</label>
                              <input name="nis" class="form-control">
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-6 col-md-6">
                        <label>Kelas</label>
                        <input type="text" name="kelas" class="form-control">
                    </div>
                    <div class="col-6 col-md-6">
                        <label>Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="3" class="form-control"></textarea>
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

  @foreach ($user as $u)
      <div class="modal fade" id="editUser{{$u->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{url('/admin/anggota/edit/user/'.$u->id)}}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <label>FullName</label>
                            <input type="text" name="fullname" class="form-control" value="{{$u->fullname}}">
                        </div>
                        <div class="col-6 col-md-6">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="{{$u->username}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <label>Join date</label>
                            <input value="{{ Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control" disabled>
                        </div>
                        <div class="col-6 col-md-6">
                            <label>Role</label>
                            <input value="User" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="col-6 col-md-6">
                                <label>NIS</label>
                                <input name="nis" class="form-control" value="{{$u->nis}}">
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-6">
                          <label>Kelas</label>
                          <input type="text" name="kelas" class="form-control" value="{{$u->kelas}}">
                      </div>
                      <div class="col-6 col-md-6">
                          <label>Alamat</label>
                          <textarea name="alamat" id="" cols="30" rows="3" class="form-control">{{$u->alamat}}</textarea>
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

  @foreach ($user as $u)
      <div class="modal fade" id="hapusUser{{$u->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
              <form action="{{url('/admin/anggota/delete/user/'.$u->id)}}" method="POST">
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
