<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class ProfileController extends Controller
{

    public function updateA(Request $request, $id)
    {
        User::find($id)->update([
            'nis' => $request->nis,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'kelas' => $request->kelas,
            'role' => 'admin',
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

}
