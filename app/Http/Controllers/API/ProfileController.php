<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Auth;

class ProfileController extends Controller
{

    public function updateA(Request $request, $id)
    {
        $update = User::find($id);
        $update->update([
                    'nis' => $request->nis,
                    'fullname' => $request->fullname,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'alamat' => $request->alamat,
                    'kelas' => $request->kelas,
                    'role' => 'admin',
                    'join_date' => Carbon::now()->format('Y-m-d'),
                ]);
        return response()->json([
            'data' => $update
        ]);      
    }
    public function updateU(Request $request, $id)
    {
        $update = User::find($id);
        $update->update([
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
            'data' => $update
        ]);    }

}
