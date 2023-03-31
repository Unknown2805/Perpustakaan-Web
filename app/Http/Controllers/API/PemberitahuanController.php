<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemberitahuan;

class PemberitahuanController extends Controller
{
    public function index()
    {
        $pemberitahuan = Pemberitahuan::all();
        return response()->json([
           'pemberitahuan' => $pemberitahuan

        ],200);
    }
    public function store(Request $request)
    {
        $store = Pemberitahuan::create([
            'isi_pemberitahuan' => $request->isi_pemberitahuan,
            'status' => $request->status,
        ]);
        return response()->json([
           'data' => $store

        ],200);
    }
    public function update(Request $request,$id)
    {
        $update = Pemberitahuan::find($id);
        $update->update([
            'isi_pemberitahuan' => $request->isi_pemberitahuan,
            'status' => $request->status,
        ]);

        return response()->json([
           'data' => $update

        ],200);
    }
    public function destroy($id)
    {
        $delete = Pemberitahuan::find($id)->delete();
        return response()->json([
            'pesan' => 'berhasil'

         ],200);
    }
}
