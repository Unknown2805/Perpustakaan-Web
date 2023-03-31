<div class="modal fade" id="pdfPengembalian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Print PDF Pengembalian</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="{{url('/admin/laporan/pdfk')}}" method="POST">
                @csrf
                <div class="modal-body">                   
                    <div class="row">
                        <div class="col-12 col-md-12 mb-2">
                            <label>Dari</label>
                            <input type="date" name="start" class="form-control">
                        </div>
                        <div class="col-12 col-md-12 mb-2">
                            <label>Sampai</label>
                            <input type="date" name="end" class="form-control">
                        </div>
                        <div class="col-12 col-md-12">
                            <button class="btn btn-danger w-100" type="submit"><i class="bi bi-printer-fill"></i> Cetak Pengembalian </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="excelPengembalian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Print Excel Pengembalian</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="{{url('/admin/laporan/excelk')}}" method="POST">
                @csrf
                <div class="modal-body">                   
                    <div class="row">
                        <div class="col-12 col-md-12 mb-2">
                            <label>Dari</label>
                            <input type="date" name="start" class="form-control">
                        </div>
                        <div class="col-12 col-md-12 mb-2">
                            <label>Sampai</label>
                            <input type="date" name="end" class="form-control">
                        </div>
                        <div class="col-12 col-md-12">
                            <button class="btn btn-success w-100" type="submit"><i class="bi bi-printer-fill"></i> Cetak Pengembalian </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>