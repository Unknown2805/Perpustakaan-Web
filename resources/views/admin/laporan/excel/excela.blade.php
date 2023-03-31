<html>
    <body>
        @if ($status === 1)                
            <table>
                <tbody>
                    <tr></tr>
                    <tr>
                        <td></td>
                        <td colspan="6" style="font-weight:bold;border:5px solid black;text-align:center">Data Peminjaman Dari {{$nama}}</td>        
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
                    @foreach ($anggota as $a)
                        <tr>
                            <td></td>
                            <td style="text-align:center;border:5px solid black" class="text-success">{{$loop->iteration}}</td>
                            <td style="border:5px solid black">{{$a->user->fullname}}</td>
                            <td style="border:5px solid black">{{$a->buku->judul}}</td>
                            <td style="border:5px solid black">{{$a->tgl_peminjaman}}</td>
                            <td style="border:5px solid black">{{$a->kondisi_buku_saat_dipinjam}}</td>               
                            <td style="border:5px solid black">Dipinjam</td>                    
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        @elseif($status === 2)           
            <table>
                <tbody>
                    <tr></tr>
                    <tr>
                        <td></td>
                        <td colspan="9" style="font-weight:bold;border:5px solid black;text-align:center">Data Pengembalian Dari {{$nama}}</td>                    
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
                    @foreach ($anggota as $a)
                        <tr>
                            <td></td>
                            <td style="text-align:center;border:5px solid black" class="text-success">{{$loop->iteration}}</td>
                            <td style="border:5px solid black">{{$a->user->fullname}}</td>
                            <td style="border:5px solid black">{{$a->buku->judul}}</td>
                            <td style="border:5px solid black">{{$a->tgl_peminjaman}}</td>
                            <td style="border:5px solid black">{{$a->tgl_pengembalian}}</td>
                            <td style="border:5px solid black">{{$a->kondisi_buku_saat_dipinjam}}</td>                   
                            <td style="border:5px solid black">{{$a->kondisi_buku_saat_dikembalikan}}</td>                 
                            @if ($a->denda === null)
                            <td style="border:5px solid black">Tidak ada</td>
                            @else
                            <td style="border:5px solid black">{{$a->denda}}</td>
                            @endif                           
                            <td style="border:5px solid black">Dikembalikan</td>                  
                        </tr> 
                    @endforeach
                </tbody>
            </table>     
        @elseif($status === 3)                
            <table>
                <tbody>
                    <tr></tr>
                    <tr>
                        <td></td>
                        <td colspan="9" style="font-weight:bold;border:5px solid black;text-align:center">Semua Data Dari {{$nama}}</td>                    
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
                    @foreach ($anggota as $a)
                        <tr>
                            <td></td>
                            <td style="text-align:center;border:5px solid black" class="text-success">{{$loop->iteration}}</td>
                            <td style="border:5px solid black">{{$a->user->fullname}}</td>
                            <td style="border:5px solid black">{{$a->buku->judul}}</td>
                            <td style="border:5px solid black">{{$a->tgl_peminjaman}}</td>
                            @if ($a->tgl_pengembalian === null)
                            <td style="border:5px solid black">Belum Dikembalikan</td>
                            @else
                            <td style="border:5px solid black">{{$a->tgl_pengembalian}}</td>
                            @endif
                            <td style="border:5px solid black">{{$a->kondisi_buku_saat_dipinjam}}</td>
                            @if ($a->kondisi_buku_saat_dikembalikan === null)
                            <td style="border:5px solid black">Belum Dikembalikan</td>
                            @else
                            <td style="border:5px solid black">{{$a->kondisi_buku_saat_dikembalikan}}</td>
                            @endif
                            @if ($a->denda === null)
                            <td style="border:5px solid black">Tidak ada</td>
                            @else
                            <td style="border:5px solid black">{{$a->denda}}</td>
                            @endif                           
                            <td style="border:5px solid black">Dikembalikan</td>                  
                        </tr> 
                    @endforeach
                </tbody>
            </table>   
        @endif
    </body>
</html>



