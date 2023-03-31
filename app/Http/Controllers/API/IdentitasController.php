<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use Illuminate\Http\Request;

class IdentitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $identitas = Identitas::all();
        return response()->json([
            'data' => $identitas
        ]);
    }

    public function update(Request $request, $id)
    {
        $identitas = Identitas::find($id);
        
        if($request->gambar){

            $img = $request->file('gambar');
            $filename = $img->getClientOriginalName();

            if ($request->hasFile('gambar')) {
                $request->file('gambar')->storeAs('/identitas',$filename);
            }
            $gambar = $request->file('gambar')->getClientOriginalName();
            $result = '/storage/identitas/'.$gambar;

            $identitas->update([
                'gambar' => $result,
                'nama_app' => $request->nama_app,
                'email_app' => $request->email_app,
                'alamat' => $request->alamat,
                'nomor_hp' => $request->nomor_hp,
            ]);
        }else{
            $identitas->update([
                'nama_app' => $request->nama_app,
                'email_app' => $request->email_app,
                'alamat' => $request->alamat,
                'nomor_hp' => $request->nomor_hp,
            ]);
        }

        return response()->json([
            'data' => $identitas
        ]);
    }

}
