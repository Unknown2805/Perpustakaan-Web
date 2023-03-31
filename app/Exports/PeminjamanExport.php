<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Carbon\Carbon;

class PeminjamanExport implements FromView
{

    public function __construct($request){
        $this->request = $request;
    }
        public function view(): View
        {
            $tgl1 = carbon::parse($this->request->start)->format('Y-m-d');
            $tgl2 = carbon::parse($this->request->end)->format('Y-m-d');

            // dd($tgl1);
            $peminjaman = Peminjaman::whereNull('tgl_pengembalian')->whereBetween('tgl_peminjaman', [$tgl1, $tgl2])->get();
            
            return view('admin.laporan.excel.excel',compact('peminjaman', 'tgl1', 'tgl2'));
        }
    
}
