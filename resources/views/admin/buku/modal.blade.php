<div class="modal fade" id="addBuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Buku</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{url('/admin/buku/add')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-6 col-md-6">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control">
                    </div>
                    <div class="col-6 col-md-6">
                        <label>Pengarang</label>
                        <input type="text" name="pengarang" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-6">
                        <label>ISBN</label>
                        <input type="number" name="isbn" class="form-control">
                    </div>
                    <div class="col-6 col-md-6">
                        <label>Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-6">
                        <label>Buku Baik</label>
                        <input type="number" name="j_buku_baik" class="form-control">
                    </div>
                    <div class="col-6 col-md-6">
                        <label>Buku Rusak</label>
                        <input type="number" name="j_buku_rusak" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-6">
                        <label>Denda Buku Rusak</label>
                        <input type="number" name="denda_r" class="form-control">
                    </div>
                    <div class="col-6 col-md-6">
                        <label>Denda Buku Hilang</label>
                        <input type="number" name="denda_h" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-6">
                        <label>Kategori</label>
                        <select name="kategori_id" class="form-select">
                            @foreach ($kategori as $k)
                                <option value="{{$k->id}}">{{   $k->nama    }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 col-md-6">
                        <label>Penerbit</label>
                        <select name="penerbit_id" class="form-select">
                            @foreach ($penerbit as $p)
                                <option value="{{$p->id}}">{{$p->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <label>Foto/Gambar</label>
                        <input type="file" name="gambar" class="form-control">
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


@foreach ($buku as $b)
    <div class="modal fade" id="editBuku{{$b->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Buku</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('/admin/buku/edit/'.$b->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" value="{{$b->judul}}">
                        </div>
                        <div class="col-6 col-md-6">
                            <label>Pengarang</label>
                            <input type="text" name="pengarang" class="form-control" value="{{$b->pengarang}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <label>ISBN</label>
                            <input type="number" name="isbn" class="form-control" value="{{$b->isbn}}">
                        </div>
                        <div class="col-6 col-md-6">
                            <label>Tahun Terbit</label>
                            <input type="number" name="tahun_terbit" class="form-control" value="{{$b->tahun_terbit}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <label>Buku Baik</label>
                            <input type="number" name="j_buku_baik" class="form-control" value="{{$b->j_buku_baik}}">
                        </div>
                        <div class="col-6 col-md-6">
                            <label>Buku Rusak</label>
                            <input type="number" name="j_buku_rusak" class="form-control" value="{{$b->j_buku_rusak}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <label>Denda Buku Rusak</label>
                            <input type="number" name="denda_r" class="form-control" value="{{$b->denda_r}}">
                        </div>
                        <div class="col-6 col-md-6">
                            <label>Denda Buku Hilang</label>
                            <input type="number" name="denda_h" class="form-control" value="{{$b->denda_h}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <label>Kategori</label>
                            <select name="kategori_id" class="form-select">
                                @foreach ($kategori as $k)
                                    <option value="{{$k->id}}">{{$k->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 col-md-6">
                            <label>Penerbit</label>
                            <select name="penerbit_id" class="form-select">
                                @foreach ($penerbit as $p)
                                    <option value="{{$p->id}}">{{$p->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <label>Foto/Gambar</label>
                            <input type="file" name="gambar" class="form-control">
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

@foreach ($buku as $b)
    <div class="modal fade" id="hapusBuku{{$b->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Buku</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="{{url('/admin/buku/delete/'.$b->id)}}" method="POST">
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
