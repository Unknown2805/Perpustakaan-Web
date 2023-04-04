<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-perpus</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
    @php
        use App\Models\Identitas;
        $identitas = Identitas::all();
    @endphp
<body>
    @foreach ($identitas as $i)
        <div class="row">

            <div class="col-12 col-md-12">
                <h1 class="text-center">
                    <img src="{{$i->gambar ? public_path($i->gambar) : public_path('/images/image.png')}}" style="width:150px;height:150px;border-radius:20px" >
                </h1>
                <span>
                    <p class="text-center" style="font-size:30px">{{$i->nama_app}}</p>
                    <p class="text-center" style="font-size:20px">{{$i->alamat}}, {{$i->nomor_hp}}</p>
                    <p class="text-center" style="font-size:18px">{{$i->email_app}}</p>
                </span>
            </div>

        </div>
        <hr>
        <br>
        <br>              
    @endforeach
    <div class="card">
        <div class="card-header">
            <h6>Peminjaman</h6>
            <p>per tanggal {{Carbon\Carbon::parse($tgl1)->format('d/m/y')}} - {{Carbon\Carbon::parse($tgl2)->format('d/m/y')}}</p>
        </div>
        <div class="card-body">
            @if (!isset($pengembalian[0]->tgl_pengembalian))
                Data tidak ada
            @else
                <table class="table" id="table1">
                    <thead>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Kondisi saat dipinjam</th>
                        <th>Kondisi saat dikembalikan</th>
                        <th>Denda</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach ($pengembalian as $p)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->user->fullname}}</td>
                                <td>{{$p->buku->judul}}</td>
                                <td>{{$p->tgl_peminjaman}}</td>
                                <td>{{$p->tgl_pengembalian}}</td>
                                <td>{{$p->kondisi_buku_saat_dipinjam}}</td>                            
                                <td>{{$p->kondisi_buku_saat_dikembalikan}}</td>                             
                                @if ($p->denda === null)
                                <td>Tidak ada</td>
                                @else
                                <td>{{$p->denda}}</td>
                                @endif                           
                                <td>Dikembalikan</td>                       
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
  </body>
</html>
