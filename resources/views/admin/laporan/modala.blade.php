<div class="modal fade" id="pdfAnggota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Print PDF Anggota</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="{{url('/admin/laporan/pdfa')}}" method="POST">
                    @csrf
                    <div class="modal-body">                   
                        <div class="row">
                            <div class="col-12 col-md-12 mb-2">
                                <label>Nama Anggota</label>
                                <select name="user_id" class="form-select">
                                    @foreach ($user as $u)
                                        <option value="{{$u->id}}">{{$u->fullname}}</option>
                                    @endforeach
                                </select>                        </div>
                            <div class="col-12 col-md-12 mb-2">
                                <label>Kategori</label>
                                <select name="kategori" class="form-select">
                                        <option>Dipinjam</option>
                                        <option>Dikembalikan</option>
                                        <option>Semua</option>
                                </select>                        
                            </div>
                            <div class="col-12 col-md-12">
                                <button class="btn btn-danger w-100" type="submit"><i class="bi bi-printer-fill"></i> Cetak Data Anggota</button>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
<div class="modal fade" id="excelAnggota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Print Excel Anggota</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="{{url('/admin/laporan/excela')}}" method="POST">
                    @csrf
                    <div class="modal-body">                   
                        <div class="row">
                            <div class="col-12 col-md-12 mb-2">
                                <label>Nama Anggota</label>
                                <select name="user_id" class="form-select">
                                    @foreach ($user as $u)
                                        <option value="{{$u->id}}">{{$u->fullname}}</option>
                                    @endforeach
                                </select>                        </div>
                            <div class="col-12 col-md-12 mb-2">
                                <label>Kategori</label>
                                <select name="kategori" class="form-select">
                                        <option>Dipinjam</option>
                                        <option>Dikembalikan</option>
                                        <option>Semua</option>
                                </select>                        
                            </div>
                            <div class="col-12 col-md-12">
                                <button class="btn btn-success w-100" type="submit"><i class="bi bi-printer-fill"></i> Cetak Data Anggota</button>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>