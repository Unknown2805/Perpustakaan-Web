<!DOCTYPE html>
<html lang="en">
    @php
        use App\Models\Identitas;
        $identitas = Identitas::all();
    @endphp
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link
    rel="shortcut icon"
    href="{{$identitas[0]->gambar ? asset($identitas[0]->gambar) : asset('/images/image.png') }}"
    type="image/x-icon"
    />
    <link
        rel="shortcut icon"
        href="{{$identitas[0]->gambar ? asset($identitas[0]->gambar) : asset('/images/image.png') }}"
        type="image/png"
    />

    <title>{{$identitas[0]->nama_app }} - {{Auth::user()->fullname}}</title>
    </head>

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
            </div>
            <div class="card-body">
                @if ($status === 1)                
                    <table class="table" id="table1">
                        <thead>
                            <th>No</th>
                            <th>Nama Anggota</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Kondisi saat dipinjam</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            @foreach ($anggota as $a)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$a->user->fullname}}</td>
                                    <td>{{$a->buku->judul}}</td>
                                    <td>{{$a->tgl_peminjaman}}</td>
                                    <td>{{$a->kondisi_buku_saat_dipinjam}}</td>                                    
                                    <td>Dipinjam</td>                       
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @elseif($status === 2)           
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
                            @foreach ($anggota as $a)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$a->user->fullname}}</td>
                                    <td>{{$a->buku->judul}}</td>
                                    <td>{{$a->tgl_peminjaman}}</td>
                                    <td>{{$a->tgl_pengembalian}}</td>
                                    <td>{{$a->kondisi_buku_saat_dipinjam}}</td>                     
                                    <td>{{$a->kondisi_buku_saat_dikembalikan}}</td>
                                    @if ($a->denda === null)
                                    <td>Tidak ada</td>
                                    @else
                                    <td>{{$a->denda}}</td>
                                    @endif                           
                                    <td>Dikembalikan</td>                       
                                </tr>
                            @endforeach
                        </tbody>
                    </table>            
                @elseif($status === 3)                
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
                            @foreach ($anggota as $a)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$a->user->fullname}}</td>
                                    <td>{{$a->buku->judul}}</td>
                                    <td>{{$a->tgl_peminjaman}}</td>
                                    @if ($a->tgl_pengembalian === null)
                                    <td>Belum Dikembalikan</td>
                                    @else
                                    <td>{{$a->tgl_pengembalian}}</td>
                                    @endif
                                    <td>{{$a->kondisi_buku_saat_dipinjam}}</td>
                                    @if ($a->kondisi_buku_saat_dikembalikan === null)
                                    <td>Belum Dikembalikan</td>
                                    @else
                                    <td>{{$a->kondisi_buku_saat_dikembalikan}}</td>
                                    @endif
                                    @if ($a->denda === null)
                                    <td>Tidak ada</td>
                                    @else
                                    <td>{{$a->denda}}</td>
                                    @endif  
                                    @if ($a->kondisi_buku_saat_dikembalikan === null)
                                    <td>Dipinjam</td>    
                                    @else
                                    <td>Dikembalikan</td>                       
                                    @endif                         
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </body>
</html>