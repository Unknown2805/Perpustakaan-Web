<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::all();
        return view('admin.penerbit.index',compact('penerbit'));
    }

    public function store(Request $request)
    {
        Penerbit::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
        ]);
        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        Penerbit::find($id)->update([
            'nama' => $request->nama,
            'kode' => $request->kode,
        ]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        Penerbit::find($id)->delete();
        return redirect()->back();
    }
}
