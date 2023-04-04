<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use App\Models\Peminjaman;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PeminjamanExport;
use App\Exports\PengembalianExport;
use App\Exports\AnggotaExport;


class LaporanController extends Controller
{
    
    public function pdf(Request $request)
    {
        $tgl1 = carbon::parse($request->start)->format('Y-m-d');
        $tgl2 = carbon::parse($request->end)->format('Y-m-d');
        $peminjaman= Peminjaman::whereNull('tgl_pengembalian')->whereBetween('tgl_peminjaman', [$tgl1, $tgl2])->get(); 
        $data = $peminjaman->count();
        if($data === 0 ){
            return redirect()->back();
        }
        elseif($data > 0)
        {
            $pdf = PDF::loadview('admin.laporan.pdf.pdf',
            [
                'peminjaman'=>$peminjaman,
                'tgl1' => $tgl1,
                'tgl2' => $tgl2
            ])->setPaper('a4', 'landscape');
            // dd($pdf);
            return $pdf->download('laporan-peminjaman.pdf');

        }      
    }
    public function pdfk(Request $request)
    {
        $tgl1 = carbon::parse($request->start)->format('Y-m-d');
        // dd($tgl1);
        $tgl2 = carbon::parse($request->end)->format('Y-m-d');
        $pengembalian= Peminjaman::whereNotNull('tgl_pengembalian')->whereBetween('tgl_pengembalian', [$tgl1, $tgl2])->get();    
        $data = $pengembalian->count();
        // dd($pengembalian->count());
        if($data === 0){
            return redirect()->back();
        }
        elseif($data > 0) 
        {
            $pdf = PDF::loadview('admin.laporan.pdf.pdfk',
            [
                'pengembalian'=>$pengembalian,
                'tgl1' => $tgl1,
                'tgl2' => $tgl2
            ])->setPaper('a4', 'landscape');
            return $pdf->download('laporan-pengembalian.pdf');
        }   
    }
    public function pdfa(Request $request)
    {

        if($request->kategori === 'Dipinjam'){

            $anggota = Peminjaman::where('user_id',$request->user_id)->whereNull('tgl_pengembalian')->get();   
            $status = 1;
            $data = $anggota->count();
            if($data === 0 ){
                return redirect()->back();
            }
            elseif($data > 0)
            {
                $pdf = PDF::loadview('admin.laporan.pdf.pdfa',
                [
                    'anggota' => $anggota,
                    'status' => $status,
                ])->setPaper('a4', 'landscape');
                return $pdf->download('laporan-anggota.pdf');
            }
        }elseif($request->kategori === 'Dikembalikan'){
            $anggota = Peminjaman::where('user_id',$request->user_id)->whereNotNull('tgl_pengembalian')->get();        
            $status = 2;
            $data = $anggota->count();
            if($data === 0 ){
                return redirect()->back();
            }
            elseif($data > 0)
            {
                $pdf = PDF::loadview('admin.laporan.pdf.pdfa',
                [
                    'anggota' => $anggota,
                    'status' => $status,
                ])->setPaper('a4', 'landscape');
                return $pdf->download('laporan-anggota.pdf');
            }                
        }elseif($request->kategori === 'Semua'){
            $anggota = Peminjaman::where('user_id',$request->user_id)->get();        
            $status = 3;
            $data = $anggota->count();
            if($data === 0 ){
                return redirect()->back();
            }
            elseif($data > 0)
            {
                $pdf = PDF::loadview('admin.laporan.pdf.pdfa',
                [
                    'anggota' => $anggota,
                    'status' => $status,
                ])->setPaper('a4', 'landscape');
                return $pdf->download('laporan-anggota.pdf');
            }                    
        }

    }

    public function excel(Request $request  )
    {
        $tgl1 = carbon::parse($request->start)->format('Y-m-d');
        $tgl2 = carbon::parse($request->end)->format('Y-m-d');
        $peminjaman = Peminjaman::whereNull('tgl_pengembalian')->whereBetween('tgl_peminjaman', [$tgl1, $tgl2])->get();
        $data = $peminjaman->count();
        if($data === 0){
            return redirect()->back();                    
        }
        elseif($data > 0){
            return Excel::download(new PeminjamanExport($request), 'peminjaman.xlsx');
        }
    }
    public function excelk(Request $request )
    {
        $tgl1 = carbon::parse($request->start)->format('Y-m-d');
        $tgl2 = carbon::parse($request->end)->format('Y-m-d');
        $peminjaman = Peminjaman::whereNotNull('tgl_pengembalian')->whereBetween('tgl_peminjaman', [$tgl1, $tgl2])->get();
        $data = $peminjaman->count();
        if($data === 0){
            return redirect()->back();                
        }
        elseif($data > 0){
            return Excel::download(new PengembalianExport($request), 'pengembalian.xlsx');
        }
    }
    public function excela(Request $request)
    {

        if($request->kategori === 'Dipinjam')
            {
                $anggota = Peminjaman::where('user_id',$request->user_id)->whereNull('tgl_pengembalian')->get();                                          
            }
        elseif($request->kategori === 'Dikembalikan')
            {
                $anggota = Peminjaman::where('user_id',$request->user_id)->whereNotNull('tgl_pengembalian')->get();                        
            }
        elseif($request->kategori === 'Semua')
            {
                $anggota = Peminjaman::where('user_id',$request->user_id)->get();                                           
            }
        
        $data = $anggota->count(); 
        if($data === 0)
            {
                return redirect()->back();
            }
        else
            {
                return Excel::download(new AnggotaExport($request), 'anggota.xlsx');
            }
    }
}
