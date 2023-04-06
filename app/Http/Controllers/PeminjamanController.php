<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pemberitahuan;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Storage;

class PeminjamanController extends Controller
{
    public function admin()
    {
        $buku = Buku::all();
        $peminjaman = Peminjaman::whereNull('tgl_pengembalian')->get();
        return view('admin.laporan.peminjaman',compact('peminjaman','buku'));
    }
    public function admink()
    {
        $buku = Buku::all();
        $pengembalian= Peminjaman::whereNotNull('tgl_pengembalian')->get();
        return view('admin.laporan.pengembalian',compact('pengembalian','buku'));
    }
    public function user()
    {

        $buku = Buku::all();
        $peminjaman = Peminjaman::where('user_id',Auth::user()->id)->get();
        $cek = Peminjaman::whereNull('tgl_pengembalian')->where('user_id',Auth::user()->id)->count();
        if(!$cek){
            $pdf = PDF::loadview('user.bebas-pustaka.index',
            [
                'peminjaman'=>$peminjaman,
                'tgl1' => Carbon::now(),
                'tgl2' => Carbon::now()
            ])->setPaper('a4', 'landscape');

            $content =  $pdf->download()->getOriginalContent();
            Storage::put('bebas-pustaka/'.Auth::user()->username.Auth::user()->id.'.pdf',$content);
            return view('user.peminjaman.index',compact('peminjaman','buku','cek'));
        }else{

            return view('user.peminjaman.index',compact('peminjaman','buku'));
            

        }
        // dd($cek);
    }
    public function store(Request $request)
    {
        Peminjaman::create([
                'user_id' => Auth::user()->id,
                'buku_id' => $request->buku_id,
                'tgl_peminjaman' => Carbon::now()->format('Y-m-d'),
                'kondisi_buku_saat_dipinjam' => $request->kondisi_buku_saat_dipinjam,
        ]);

        $buku = Buku::where('id',$request->buku_id)->first();
        if($request->kondisi_buku_saat_dipinjam === 'baik'){
            Buku::where('id',$request->buku_id)->update([
                'j_buku_baik' => $buku->j_buku_baik - 1
            ]);
        }else{
            Buku::where('id',$request->buku_id)->update([
                'j_buku_rusak' => $buku->j_buku_rusak - 1
            ]);
        }
        Pemberitahuan::create([
            'isi_pemberitahuan' => Auth::user()->fullname . ' telah meminjam buku'
        ]);
        return redirect()->back();
    }
    public function kembali(Request $request,$id)
    {
        $data = Peminjaman::find($id);
        $buku = Buku::where('id',$data->buku_id)->first();
        // dd($buku);
// dd($data);
        if($data->kondisi_buku_saat_dipinjam === 'baik'){

            if($request->kondisi_buku_saat_dikembalikan === 'baik'){
                Buku::where('id',$data->buku_id)->update([
                    'j_buku_baik' => $buku->j_buku_baik + 1
                ]);

                Peminjaman::find($id)->update([
                    'tgl_pengembalian' => Carbon::now()->format('Y-m-d'),
                    'kondisi_buku_saat_dikembalikan' => $request->kondisi_buku_saat_dikembalikan,
                ]);

            }elseif($request->kondisi_buku_saat_dikembalikan === 'rusak'){
                Buku::where('id',$data->buku_id)->update([
                    'j_buku_rusak' => $buku->j_buku_rusak + 1
                ]);

                Peminjaman::find($id)->update([
                'tgl_pengembalian' => Carbon::now()->format('Y-m-d'),
                'kondisi_buku_saat_dikembalikan' => $request->kondisi_buku_saat_dikembalikan,
                'denda' => $buku->denda_r
                ]);

            }elseif($request->kondisi_buku_saat_dikembalikan === 'hilang'){

                Peminjaman::find($id)->update([
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

                Peminjaman::find($id)->update([
                'tgl_pengembalian' => Carbon::now()->format('Y-m-d'),
                'kondisi_buku_saat_dikembalikan' => $request->kondisi_buku_saat_dikembalikan,
                ]);

            }elseif($request->kondisi_buku_saat_dikembalikan === 'hilang'){

                Peminjaman::find($id)->update([
                'tgl_pengembalian' => Carbon::now()->format('Y-m-d'),
                'kondisi_buku_saat_dikembalikan' => $request->kondisi_buku_saat_dikembalikan,
                'denda' => $buku->denda_h
                ]);

            }
        }
        Pemberitahuan::create([
            'isi_pemberitahuan' => Auth::user()->fullname . ' telah mengembalikan buku'
        ]);
        return redirect()->back();
    }
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
