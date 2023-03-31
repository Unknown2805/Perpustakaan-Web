<div class="modal fade" id="addPesan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pesan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <form action="{{url('/user/pesan/add/keluar')}}" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="row">
                      <div class="col-6 col-md-6">
                          <label>Pengirim</label>
                          <input type="text" class="form-control" value="{{Auth::user()->fullname}}" disabled>
                      </div>
                      <div class="col-6 col-md-6">
                        <label>Penerima</label>
                        <select name="penerima_id" class="form-select">
                            @foreach ($penerima as $p)
                                <option value="{{$p->id}}">{{   $p->fullname    }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <label>Judul Pesan</label>
                            <input type="text" name="judul_pesan" class="form-control">
                        </div>
                        <div class="col-6 col-md-6">
                            <label>Isi Pesan</label>
                            <input type="text" name="isi_pesan" class="form-control">
                        </div>
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

@foreach ($keluar as $k)
    <div class="modal fade" id="hapusPesan{{$k->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Pesan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="{{url('/user/pesan/delete/keluar/'.$k->id)}}" method="POST">
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
