<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
        return response()->json([
            'data' => $buku
        ]);
    }

    public function store(Request $request)
    {
        if($request->gambar){

            $img = $request->file('gambar');
            $filename = $img->getClientOriginalName();

            if ($request->hasFile('gambar')) {
                $request->file('gambar')->storeAs('/buku',$filename);
            }
            $gambar = $request->file('gambar')->getClientOriginalName();
            $result = '/storage/buku/'.$gambar;
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
                ]);
        }else{
            $buku = Buku::create([
                'kategori_id' => $request->kategori_id,
                'penerbit_id' => $request->penerbit_id,
                'judul' => $request->judul,
                'pengarang' => $request->pengarang,
                'tahun_terbit' => $request->tahun_terbit,
                'isbn' => $request->isbn,
                'j_buku_baik' => $request->j_buku_baik,
                'j_buku_rusak' => $request->j_buku_rusak,
                ]);
        }

        return response()->json([
            'data' => $buku
        ]);
    }

    public function update(Request $request,$id)
    {
        $buku = Buku::find($id);

        if($request->gambar){

            $img = $request->file('gambar');
            $filename = $img->getClientOriginalName();

            if ($request->hasFile('gambar')) {
                $request->file('gambar')->storeAs('/buku',$filename);
            }
            $gambar = $request->file('gambar')->getClientOriginalName();
            $result = '/storage/buku/'.$gambar;

            $buku->update([
                'gambar' => $result,
                'kategori_id' => $request->kategori_id,
                'penerbit_id' => $request->penerbit_id,
                'judul' => $request->judul,
                'pengarang' => $request->pengarang,
                'tahun_terbit' => $request->tahun_terbit,
                'isbn' => $request->isbn,
                'j_buku_baik' => $request->j_buku_baik,
                'j_buku_rusak' => $request->j_buku_rusak,
            ]);

        }else{

            $buku->update([
                'kategori_id' => $request->kategori_id,
                'penerbit_id' => $request->penerbit_id,
                'judul' => $request->judul,
                'pengarang' => $request->pengarang,
                'tahun_terbit' => $request->tahun_terbit,
                'isbn' => $request->isbn,
                'j_buku_baik' => $request->j_buku_baik,
                'j_buku_rusak' => $request->j_buku_rusak,
            ]);
        }
        return response()->json([
            'data' => $buku
        ]);
    }

    public function destroy($id)
    {
        Buku::find($id)->delete();
        return response()->json([
            'pesan' => 'berhasil'
        ]);
    }
}
