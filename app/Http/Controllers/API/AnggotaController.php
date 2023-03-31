<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Auth;

class AnggotaController extends Controller
{

    public function indexA()
    {
        $admin = User::where('role','admin')->get();
        return response()->json([
            'data' => $admin
        ]);
    }
    public function register(Request $request)
    {
        // dd($request);
        $user = User::count();
        $register = User::create([
            'kode_user' => 'U'.$user,
            'nis' => $request->nis,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),           
            'role' => 'user',
            'join_date' => Carbon::now()->format('Y-m-d'),
            'verif' => null
        ]);
        return response()->json([
            'data' => $register
        ]);
    }
    public function storeA(Request $request)
    {
        $user = User::count();
        $createA = User::create([
            'kode_user' => 'A'.$user,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'verif' => 'verified',
            'role' => 'admin',
            'join_date' => Carbon::now()->format('Y-m-d'),
        ]);
        return response()->json([
            'data' => $createA
        ]);
    }
    public function laporan(){
        $laporan = User::where('role', 'user')->get();
         return response()->json([
            'data' => $laporan
        ]);
    }

    public function updateA(Request $request, $id)
    {
        $updateA = User::find($id);
        $updateA->update([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        return response()->json([
            'data' => $updateA
        ]);
    }
    public function destroyA($id)
    {
        User::find($id)->delete();
        return response()->json([
            'pesan' => 'berhasil'
        ]);
    }

    public function indexU()
    {
        $user = User::where('role','user')->get();
        return response()->json([
            'data' => $user
        ]);
    }
    public function storeU(Request $request)
    {
        $user = User::count();
        $createU = User::create([
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
        return response()->json([
            'data' => $createU
        ]);    }
    public function updateU(Request $request, $id)
    {
        $updateU = User::find($id);
        $updateU->update([
            'nis' => $request->nis,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'kelas' => $request->kelas,
            'role' => 'user',
            'join_date' => Carbon::now()->format('Y-m-d'),
        ]);
        return response()->json([
            'data' => $updateU
        ]);
    }
    public function verif(Request $request, $id)
    {
        User::find($id)->update([
            'verif' => 'verified'
        ]);
        return response()->json([
            'pesan' => 'user telah terverified'
        ]);    }
    public function destroyU($id)
    {
        User::find($id)->delete();
        return response()->json([
            'data' => 'berhasil'
        ]);

    }
}

