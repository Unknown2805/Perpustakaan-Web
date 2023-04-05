<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class BukuController extends Controller
{

    public function index()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        return view('admin.buku.index',compact('buku','kategori','penerbit'));
    }

    public function store(Request $request)
    {
        // dd($request);
        if($request->gambar){

            $img = $request->file('gambar');
            $filename = $img->getClientOriginalName();

            if ($request->hasFile('gambar')) {
                $request->file('gambar')->storeAs('/buku',$filename);
            }
            $gambar = $request->file('gambar')->getClientOriginalName();
            $result = '/storage/buku/'.$gambar;
        }else{
            $result = null;
        }
        $buku = Buku::create([
        'gambar' => $result,
        'kategori_id' => $request->kategori_id,
        'penerbit_id' => $request->penerbit_id,
        'judul' => $request->judul,
        'pengarang' => $request->pengarang,
        'tahun_terbit' => $request->tahun_terbit,
        'isbn' => $request->isbn,
        'j_buku_baik' => $request->j_buku_baik,
        'j_buku_rusak' => $request->j_buku_rusak,
        'denda_r' => $request->denda_r,
        'denda_h' => $request->denda_h,
        ]);
        return redirect()->back();

    }

    public function update(Request $request,$id)
    {
        if($request->gambar){

            $img = $request->file('gambar');
            $filename = $img->getClientOriginalName();

            if ($request->hasFile('gambar')) {
                $request->file('gambar')->storeAs('/buku',$filename);
            }
            $gambar = $request->file('gambar')->getClientOriginalName();
            $result = '/storage/buku/'.$gambar;
            $buku = Buku::find($id)->update([
                'gambar' => $result,
                'kategori_id' => $request->kategori_id,
                'penerbit_id' => $request->penerbit_id,
                'judul' => $request->judul,
                'pengarang' => $request->pengarang,
                'tahun_terbit' => $request->tahun_terbit,
                'isbn' => $request->isbn,
                'j_buku_baik' => $request->j_buku_baik,
                'j_buku_rusak' => $request->j_buku_rusak,
                'denda_r' => $request->denda_r,
                'denda_h' => $request->denda_h,
            ]);
        }else{
            $buku = Buku::find($id)->update([
                'kategori_id' => $request->kategori_id,
                'penerbit_id' => $request->penerbit_id,
                'judul' => $request->judul,
                'pengarang' => $request->pengarang,
                'tahun_terbit' => $request->tahun_terbit,
                'isbn' => $request->isbn,
                'j_buku_baik' => $request->j_buku_baik,
                'j_buku_rusak' => $request->j_buku_rusak,
                'denda_r' => $request->denda_r,
                'denda_h' => $request->denda_h,
            ]);
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        Buku::find($id)->delete();
        return redirect()->back();
    }
}
