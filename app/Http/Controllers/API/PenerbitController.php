<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::all();
        return response()->json([
            'data' => $penerbit
        ]);        
    }

    public function store(Request $request)
    {
        $penerbit = Penerbit::create([
                    'nama' => $request->nama,
                    'kode' => $request->kode,
                    ]);
        return response()->json([
            'data' => $penerbit
        ]);      
    }

    public function update(Request $request,$id)
    {
        $penerbit = Penerbit::find($id);
        $penerbit->update([
                        'nama' => $request->nama,
                        'kode' => $request->kode,
                    ]);
        return response()->json([
            'data' => $penerbit
        ]);          
    }

    public function destroy($id)
    {
        Penerbit::find($id)->delete();
        return response()->json([
            'pesan' => 'berhasil'
        ]);          
    }
}
