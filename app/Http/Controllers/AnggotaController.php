<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
class AnggotaController extends Controller
{

    public function indexA()
    {
        $admin = User::where('role','admin')->get();
        return view('admin.anggota.admin',compact('admin'));
    }
    public function register(Request $request)
    {
        // dd($request);
        $user = User::count();
        User::create([
            'kode_user' => 'U'.$user,
            'nis' => $request->nis,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),           
            'role' => 'user',
            'join_date' => Carbon::now()->format('Y-m-d'),
        ]);
        return redirect()->back();
    }
    public function storeA(Request $request)
    {
        $user = User::count();
        User::create([
            'kode_user' => 'A'.$user,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'verif' => 'verified',
            'role' => 'admin',
            'join_date' => Carbon::now()->format('Y-m-d'),
        ]);
        return redirect()->back();
    }
    public function laporan(){
        $user = User::where('role', 'user')->get();
        return view('admin.laporan.anggota',compact('user'));
    }

    public function updateA(Request $request, $id)
    {
        User::find($id)->update([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back();
    }
    public function destroyA($id)
    {
        User::find($id)->delete();
        return redirect()->back();

    }

    public function indexU()
    {
        $user = User::where('role','user')->get();
        return view('admin.anggota.user',compact('user'));
    }
    public function storeU(Request $request)
    {
        $user = User::count();
        User::create([
            'kode_user' => 'U'.$user,
            'nis' => $request->nis,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'kelas' => $request->kelas,
            'verif' => 'verified',
            'role' => 'user',
            'join_date' => Carbon::now()->format('Y-m-d'),
        ]);
        return redirect()->back();
    }
    public function updateU(Request $request, $id)
    {
        User::find($id)->update([
            'nis' => $request->nis,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'kelas' => $request->kelas,
            'role' => 'user',
            'join_date' => Carbon::now()->format('Y-m-d'),
        ]);
        return redirect()->back();
    }
    public function verif(Request $request, $id)
    {
        User::find($id)->update([
            'verif' => 'verified'
        ]);
        return redirect()->back();
    }
    public function destroyU($id)
    {
        User::find($id)->delete();
        return redirect()->back();


    }
}
