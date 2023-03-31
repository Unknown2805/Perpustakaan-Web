<?php

namespace App\Http\Controllers;

use App\Models\Pemberitahuan;
use Illuminate\Http\Request;

class PemberitahuanController extends Controller
{
    public function index()
    {
        $pemberitahuan = Pemberitahuan::all();
        return view('admin.pemberitahuan.index',compact('pemberitahuan'));
    }
    public function store(Request $request)
    {
        $store = Pemberitahuan::create([
            'isi_pemberitahuan' => $request->isi_pemberitahuan,
            'status' => $request->status,
        ]);
        return redirect()->back();
    }
    public function update(Request $request,$id)
    {
        $update = Pemberitahuan::find($id);
        $update->update([
            'isi_pemberitahuan' => $request->isi_pemberitahuan,
            'status' => $request->status,
        ]);
        return redirect()->back();
    }
    public function destroy($id)
    {
        $delete = Pemberitahuan::find($id)->delete();
        return redirect()->back();
    }
}
