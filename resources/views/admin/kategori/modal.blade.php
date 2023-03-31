<div class="modal fade" id="addKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{url('/admin/kategori/add')}}" method="POST">
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
@foreach ($kategori as $k)
    <div class="modal fade" id="editKategori{{$k->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="{{url('/admin/kategori/edit/'.$k->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{$k->nama}}">
                        </div>
                        <div class="col-6 col-md-6">
                            <label>Kode</label>
                            <input type="text" name="kode" class="form-control" value="{{$k->kode}}">
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

@foreach ($kategori as $k)
    <div class="modal fade" id="hapusKategori{{$k->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Kategori</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="{{url('/admin/kategori/delete/'.$k->id)}}" method="POST">
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
