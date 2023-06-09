<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pemberitahuan;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use PDF;

class PeminjamanController extends Controller
{
    public function admin()
    {
        $buku = Buku::all();
        $peminjaman = Peminjaman::whereNull('tgl_pengembalian')->get();
        return response()->json([
            'data' => $peminjaman
        ]);
    }
    public function admink()
    {
        $buku = Buku::all();
        $pengembalian= Peminjaman::whereNotNull('tgl_pengembalian')->get();
        return response()->json([
            'data' => $pengembalian
        ]);
    }
    public function user()
    {
        $buku = Buku::all();
        $peminjaman = Peminjaman::where('user_id',Auth::user()->id)->get();
        return response()->json([
            'data' => $peminjaman
        ]);
    }


    public function store(Request $request)
    {
        $peminjaman = Peminjaman::create([
                    'user_id' => Auth::user()->id,
                    'buku_id' => $request->buku_id,
                    'tgl_peminjaman' => Carbon::now()->format('Y-m-d'),
                    'kondisi_buku_saat_dipinjam' => $request->kondisi_buku_saat_dipinjam,
                    ]);

        $buku = Buku::where('id',$request->buku_id)->first();
        if($request->kondisi_buku_saat_dipinjam === 'baik'){
            $store = Buku::where('id',$request->buku_id)->update([
                    'j_buku_baik' => $buku->j_buku_baik - 1
                ]);
        }else{
            $store = Buku::where('id',$request->buku_id)->update([
                    'rusak' => $buku->j_buku_rusak - 1
                    ]);
        }
            $alert = Pemberitahuan::create([
                    'isi_pemberitahuan' => Auth::user()->fullname . ' telah meminjam buku'
                    ]);
        return response()->json([
            'data' => $peminjaman,
            'buku' => $store,
            'pesan' => $alert
        ]);
    }
    public function kembali(Request $request,$id)
    {
        $data = Peminjaman::find($id);
        $buku = Buku::where('id',$data->buku_id)->first();
        // dd($buku);

        if($data->kondisi_buku_saat_dipinjam === 'baik'){

            if($request->kondisi_buku_saat_dikembalikan === 'baik'){
                Buku::where('id',$data->buku_id)->update([
                    'j_buku_baik' => $buku->j_buku_baik + 1
                ]);

                $peminjaman = Peminjaman::find($id)->update([
                    'tgl_pengembalian' => Carbon::now()->format('Y-m-d'),
                    'kondisi_buku_saat_dikembalikan' => $request->kondisi_buku_saat_dikembalikan,
                ]);

            }elseif($request->kondisi_buku_saat_dikembalikan === 'rusak'){
                Buku::where('id',$data->buku_id)->update([
                    'j_buku_rusak' => $buku->j_buku_rusak + 1
                ]);

                $peminjaman = Peminjaman::find($id)->update([
                'tgl_pengembalian' => Carbon::now()->format('Y-m-d'),
                'kondisi_buku_saat_dikembalikan' => $request->kondisi_buku_saat_dikembalikan,
                'denda' => $buku->denda_r
                ]);

            }elseif($request->kondisi_buku_saat_dikembalikan === 'hilang'){

                $peminjaman = Peminjaman::find($id)->update([
                'tgl_pengembalian' => Carbon::now()->format('Y-m-d'),
                'kondisi_buku_saat_dikembalikan' => $request->kondisi_buku_saat_dikembalikan,
                'denda' => $buku->denda_h
                ]);

            }
        }elseif($data->kondisi_buku_saat_dipinjam === 'rusak'){
           if($request->kondisi_buku_saat_dikembalikan === 'rusak'){
                Buku::where('id',$data->buku_id)->update([
                    'j_buku_rusak' => $buku->j_buku_rusak + 1
                ]);

                $peminjaman = Peminjaman::find($id)->update([
                'tgl_pengembalian' => Carbon::now()->format('Y-m-d'),
                'kondisi_buku_saat_dikembalikan' => $request->kondisi_buku_saat_dikembalikan,
                ]);

            }elseif($request->kondisi_buku_saat_dikembalikan === 'hilang'){

                $peminjaman = Peminjaman::find($id)->update([
                'tgl_pengembalian' => Carbon::now()->format('Y-m-d'),
                'kondisi_buku_saat_dikembalikan' => $request->kondisi_buku_saat_dikembalikan,
                'denda' => $buku->denda_h
                ]);

            }
        }
        $alert = Pemberitahuan::create([
                'isi_pemberitahuan' => Auth::user()->fullname . ' telah mengembalikan buku'
                ]);
        return response()->json([
            'data' => $peminjaman,
            'buku' => $store,
            'pesan' => $alert
        ]);
    }
}
