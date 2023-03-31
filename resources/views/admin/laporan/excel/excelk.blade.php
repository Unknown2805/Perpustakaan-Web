<html>
    <body>
        <table>
            <tbody>
                <tr></tr>
                <tr>
                    <td></td>
                    <td colspan="9" style="font-weight:bold;border:5px solid black;text-align:center">Pengembalian</td>                    
                </tr>
                <tr>
                    <td></td>
                    <td colspan="9" style="font-weight:bold;border:5px solid black;text-align:center">
                        per tanggal {{Carbon\Carbon::parse($tgl1)->format('d/m/y')}} - {{Carbon\Carbon::parse($tgl2)->format('d/m/y')}}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align:center;font-weight:bold;border:5px solid black;width:40px">No</td>
                    <th style="font-weight:bold;border:5px solid black;width:160px">Nama Anggota</th>
                    <th style="font-weight:bold;border:5px solid black;width:160px">Judul Buku</th>
                    <th style="font-weight:bold;border:5px solid black;width:160px">Tanggal Peminjaman</th>
                    <th style="font-weight:bold;border:5px solid black;width:160px">Tanggal Pengembalian</th>
                    <th style="font-weight:bold;border:5px solid black;width:160px">Kondisi saat dipinjam</th>
                    <th style="font-weight:bold;border:5px solid black;width:160px">Kondisi saat dikembalikan</th>
                    <th style="font-weight:bold;border:5px solid black;width:160px">Denda</th>
                    <th style="font-weight:bold;border:5px solid black;width:160px">Status</th>

                </tr>
                @foreach ($pengembalian as $p)
                    <tr>
                        <td></td>
                        <td style="text-align:center;border:5px solid black" class="text-success">{{$loop->iteration}}</td>
                        <td style="border:5px solid black">{{$p->user->fullname}}</td>
                        <td style="border:5px solid black">{{$p->buku->judul}}</td>
                        <td style="border:5px solid black">{{$p->tgl_peminjaman}}</td>
                        <td style="border:5px solid black">{{$p->tgl_pengembalian}}</td>
                        <td style="border:5px solid black">{{$p->kondisi_buku_saat_dipinjam}}</td>                        
                        <td style="border:5px solid black">{{$p->kondisi_buku_saat_dikembalikan}}</td>
                        @if ($p->denda === null)
                        <td style="border:5px solid black">Tidak ada</td>
                        @else
                        <td style="border:5px solid black">{{$p->denda}}</td>
                        @endif                           
                        <td style="border:5px solid black">Dikembalikan</td>                  
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </body>
</html>