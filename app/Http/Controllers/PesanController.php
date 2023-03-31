<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Carbon\Carbon;
class PesanController extends Controller
{
    public function indexMA()
    {
        $masuk = Pesan::where('penerima_id',Auth::user()->id)->get();
        $jumlah = $masuk->count();       
        return view('admin.pesan.masuk',compact('masuk'));
    }
    public function indexKA()
    {   $penerima = User::where('role','user')->get();
        $keluar = Pesan::where('pengirim_id',Auth::user()->id)->get();
        return view('admin.pesan.keluar',compact('keluar','penerima'));
    }

    public function indexMU()
    {
        $masuk = Pesan::where('penerima_id',Auth::user()->id)->get();
        return view('user.pesan.masuk',compact('masuk'));
    }
    public function indexKU()
    {   $penerima = User::where('role','admin')->get();
        $keluar = Pesan::where('pengirim_id',Auth::user()->id)->get();
        return view('user.pesan.keluar',compact('keluar','penerima'));
    }

    public function storeK(Request $request)
    {
        Pesan::create([
            'pengirim_id' => Auth::user()->id,
            'penerima_id' => $request->penerima_id,
            'judul_pesan' => $request->judul_pesan,
            'isi_pesan' => $request->isi_pesan,
            'status' => 'terkirim',
            'tgl_kirim' => Carbon::now()->format('Y-m-d'),
        ]);
        return redirect()->back();
    }
    public function updateM(Request $request,$id)
    {
        Pesan::find($id)->update([
            'status' => 'terbaca',
        ]);
        return redirect()->back();
    }

    public function destroyM($id)
    {
        Pesan::find($id)->delete();
        return redirect()->back();
    }

    public function destroyK($id)
    {
        Pesan::find($id)->delete();
        return redirect()->back();
    }
}
