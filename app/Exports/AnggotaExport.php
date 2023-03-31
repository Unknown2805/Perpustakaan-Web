<?php

namespace App\Exports;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AnggotaExport implements FromView
{

    public function __construct($request){
        $this->request = $request;
    }
        public function view() :View    
        {
            if($this->request->kategori === 'Dipinjam'){

                $anggota = Peminjaman::where('user_id',$this->request->user_id)->whereNull('tgl_pengembalian')->get();   
                $data = User::where('id',$this->request->user_id)->first();                
                $nama = $data->fullname;
                $status = 1;         
                return view('admin.laporan.excel.excela',compact('anggota','status','nama'));
            }elseif($this->request->kategori === 'Dikembalikan'){
                $anggota = Peminjaman::where('user_id',$this->request->user_id)->whereNotNull('tgl_pengembalian')->get();        
                $data = User::where('id',$this->request->user_id)->first();
                $nama = $data->fullname;
                $status = 2;
                return view('admin.laporan.excel.excela',compact('anggota','status','nama'));    
            }elseif($this->request->kategori === 'Semua'){
                $anggota = Peminjaman::where('user_id',$this->request->user_id)->get();        
                $data = User::where('id',$this->request->user_id)->first();
                $nama = $data->fullname;
                $status = 3;
                return view('admin.laporan.excel.excela',compact('anggota','status','nama'));               
            }
        }
}
