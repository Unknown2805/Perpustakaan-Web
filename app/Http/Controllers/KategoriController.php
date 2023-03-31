<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
 
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index',compact('kategori'));
    }

    public function store(Request $request)
    {
        Kategori::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
        ]);
        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        Kategori::find($id)->update([
            'nama' => $request->nama,
            'kode' => $request->kode,
        ]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        Kategori::find($id)->delete();
        return redirect()->back();
    }
}
