<div class="modal fade" id="addPenerbit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Penerbit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{url('/admin/penerbit/add')}}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-6 col-md-6">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="col-6 col-md-6">
                        <label>Kode</label>
                        <input type="text" name="kode" class="form-control">
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
@foreach ($penerbit as $p)
    <div class="modal fade" id="editPenerbit{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Penerbit</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="{{url('/admin/penerbit/edit/'.$p->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{$p->nama}}">
                        </div>
                        <div class="col-6 col-md-6">
                            <label>Kode</label>
                            <input type="text" name="kode" class="form-control" value="{{$p->kode}}">
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

@foreach ($penerbit as $p)
    <div class="modal fade" id="hapusPenerbit{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Penerbit</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="{{url('/admin/penerbit/delete/'.$p->id)}}" method="POST">
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
