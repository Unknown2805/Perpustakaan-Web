@foreach ($masuk as $m)
<div class="modal fade" id="hapusPesan{{$m->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Kategori</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
        <form action="{{url('/admin/pesan/delete/masuk/'.$m->id)}}" method="POST">
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
