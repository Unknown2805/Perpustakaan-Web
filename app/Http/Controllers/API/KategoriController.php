<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
 
    public function index()
    {
        $kategori = Kategori::all();
        return response()->json([
            'data' => $kategori
        ]);    
    }

    public function store(Request $request)
    {
        $kategori = Kategori::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
        ]);
        return response()->json([
            'data' => $kategori
        ]);    
    }

    public function update(Request $request,$id)
    {
        $kategori = Kategori::find($id);
        $kategori->update([
            'nama' => $request->nama,
            'kode' => $request->kode,
        ]);
        return response()->json([
            'data' => $kategori
        ]);    
    }

    public function destroy($id)
    {
        Kategori::find($id)->delete();
        return response()->json([
            'pesan' => 'berhasil'
        ]);        
    }
}
