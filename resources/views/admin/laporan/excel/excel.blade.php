<html>
    <body>
        <table>
            <tbody>
                <tr></tr>
                <tr>
                    <td></td>
                    <td colspan="6" style="font-weight:bold;border:5px solid black;text-align:center">Peminjaman</td>        
                </tr>
                <tr>
                    <td></td>
                    <td colspan="6" style="font-weight:bold;border:5px solid black;text-align:center">
                        per tanggal {{Carbon\Carbon::parse($tgl1)->format('d/m/y')}} - {{Carbon\Carbon::parse($tgl2)->format('d/m/y')}}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align:center;font-weight:bold;border:5px solid black;width:40px">No</td>
                    <td style="font-weight:bold;border:5px solid black;width:160px">Nama Anggota</td>
                    <td style="font-weight:bold;border:5px solid black;width:160px">Judul Buku</td>
                    <td style="font-weight:bold;border:5px solid black;width:160px">Tanggal Peminjaman</td>
                    <td style="font-weight:bold;border:5px solid black;width:160px">Kondisi saat dipinjam</td>
                    <td style="font-weight:bold;border:5px solid black;width:160px">Status</td>

                </tr>
                @foreach ($peminjaman as $p)
                    <tr>
                        <td></td>
                        <td style="text-align:center;border:5px solid black" class="text-success">{{$loop->iteration}}</td>
                        <td style="border:5px solid black">{{$p->user->fullname}}</td>
                        <td style="border:5px solid black">{{$p->buku->judul}}</td>
                        <td style="border:5px solid black">{{$p->tgl_peminjaman}}</td>
                        <td style="border:5px solid black">{{$p->kondisi_buku_saat_dipinjam}}</td>               
                        <td style="border:5px solid black">Dipinjam</td>                    
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </body>
</html>