<div class="modal fade" id="addPeminjaman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Peminjaman</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <form action="{{url('/user/peminjaman/add')}}" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="row">
                      <div class="col-6 col-md-6">
                          <label>Peminjam</label>
                          <input type="text" class="form-control" value="{{Auth::user()->fullname}}">
                      </div>
                      <div class="col-6 col-md-6">
                        <label>Buku</label>
                        <select name="buku_id" class="form-select">
                            @foreach ($buku as $b)
                                <option value="{{$b->id}}">{{$b->judul}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-6 col-md-6">
                          <label>Kondisi Buku</label>
                          <select name="kondisi_buku_saat_dipinjam" class="form-select">
                                <option>baik</option>
                                <option>rusak</option>
                        </select>
                      </div>
                      <div class="col-6 col-md-6">
                          <label>Tanggal Pinjam</label>
                          <input class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" disabled>
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

@foreach ($peminjaman as $p)
  <div class="modal fade" id="kembali{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Pengembalian</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="{{url('/user/peminjaman/kembali/'.$p->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 col-md-6">
                          <label>Peminjam</label>
                          <input class="form-control" value="{{Auth::user()->fullname}}" disabled>
                        </div>
                        <div class="col-6 col-md-6">
                          <label>Judul Buku</label>
                          <input class="form-control" value="{{$p->buku->judul}}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-6">

                          <label>Kondisi Buku</label>
                          @if($p->kondisi_buku_saat_dipinjam === 'rusak')
                          <select name="kondisi_buku_saat_dikembalikan" class="form-select">
                                <option>rusak</option>
                                <option>hilang</option>
                          </select>
                          @elseif($p->kondisi_buku_saat_dipinjam === 'baik')
                            <select name="kondisi_buku_saat_dikembalikan" class="form-select">
                              <option>baik</option>
                              <option>rusak</option>
                              <option>hilang</option>
                            </select>
                          @endif
                        </div>
                        <div class="col-6 col-md-6">
                          <label>Tanggal Pengembalian</label>
                          <input class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" disabled>
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
