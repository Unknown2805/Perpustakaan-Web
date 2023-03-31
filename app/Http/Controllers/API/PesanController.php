<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesan;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\User;
use Carbon\Carbon;

class PesanController extends Controller
{
    public function indexMA()
    {
        $masuk = Pesan::where('penerima_id',Auth::user()->id)->get();        
        return response()->json([
            'data' => Auth::user()->fullname
        ]);      
    }
    public function indexKA()
    {   $penerima = User::where('role','user')->get();
        $keluar = Pesan::where('pengirim_id',Auth::user()->id)->get();
        return response()->json([
            'data' => $keluar
        ]);    
    }


    public function indexMU()
    {
        $masuk = Pesan::where('penerima_id',Auth::user()->id)->get();
        return response()->json([
            'data' => $masuk
        ]);    
    }
    public function indexKU()
    {   $penerima = User::where('role','admin')->get();
        $keluar = Pesan::where('pengirim_id',Auth::user()->id)->get();
        return response()->json([
            'data' => $keluar
        ]);    
    }

    public function storeK(Request $request)
    {
        $store = Pesan::create([
                'pengirim_id' => Auth::user()->id,
                'penerima_id' => $request->penerima_id,
                'judul_pesan' => $request->judul_pesan,
                'isi_pesan' => $request->isi_pesan,
                'status' => 'terkirim',
                'tgl_kirim' => Carbon::now()->format('Y-m-d'),
                ]);
        return response()->json([
            'data' => $store
        ]);        
    }
    public function updateM(Request $request,$id)
    {
        $update = Pesan::find($id);
        $update->update([
                'status' => 'terbaca',
                ]);
        return response()->json([
            'data' => $update
        ]);  
    }

    public function destroyM($id)
    {
        Pesan::find($id)->delete();
        return response()->json([
            'pesan' => 'berhasil'
        ]);      
    }

    public function destroyK($id)
    {
        Pesan::find($id)->delete();
        return response()->json([
            'pesan' => 'berhasil'
        ]);      
    }
}
