<div class="modal fade" id="addPemberitahuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pemberitahuan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{url('/admin/pemberitahuan/add')}}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <label>Isi Pemberitahuan</label>
                        <textarea name="isi_pemberitahuan" class="form-control" cols="30" rows="3"></textarea>
                    </div>
                    <div class="col-12 col-md-12">
                        <label>Status</label>
                        <select name="status" class="form-select">
                            <option>nonaktif</option>
                            <option>aktif</option>
                            <option>umum</option>
                        </select>
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
@foreach ($pemberitahuan as $p)
    <div class="modal fade" id="editPemberitahuan{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pemberitahuan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="{{url('/admin/pemberitahuan/edit/'.$p->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <label>Isi Pemberitahuan</label>
                            <textarea name="isi_pemberitahuan" class="form-control" cols="30" rows="3">{{$p->isi_pemberitahuan}}</textarea>
                        </div>
                        <div class="col-12 col-md-12">
                            <label>Status</label>
                            <select name="status" class="form-select">
                                <option value="nonaktif">nonaktif</option>
                                <option value="aktif">aktif</option>
                                <option value="umum">umum</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
    </div>
    </div>
@endforeach

@foreach ($pemberitahuan as $p)
    <div class="modal fade" id="hapusPemberitahuan{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Penerbit</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="{{url('/admin/pemberitahuan/delete/'.$p->id)}}" method="POST">
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
