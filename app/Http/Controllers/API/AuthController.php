<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\User;
use App\Models\Identitas;
use Carbon\Carbon;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'kode' => 'required',
            'fullname' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role',
            'join_date',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $user = User::create([
            'kode' => $request->kode,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'join_date' => Carbon::now()->format('Y-m-d'),
         ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    public function login(Request $request)
    {
        
        if (!Auth::attempt($request->only('username', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }
        elseif (Auth::user()->verif == null){
            return response()
            ->json(['message' => 'User is Unverified'], 401);
        }

        $user = User::where('username', $request['username'])->firstOrFail();
        $i = Identitas::where('id',1)->first();
        $token = $user->createToken('auth_token')->plainTextToken;

        $user->update([
            'terakhir_login' => Carbon::now()->format('Y-m-d'),
        ]);

        return response()
            ->json([
                'message' => 'Hi '.Auth::user()->fullname.', welcome to '. $i->nama_app,
                'access_token' => $token,
                'token_type' => 'Bearer',
                'verif' => Auth::user()->verif,
                'terakhir_login' => Carbon::now()->format('Y-m-d'),
            ]);
    }
    
    public function verif(Request $request,$id)
    {
        // dd($id);
        $user = User::find($id);
        $user->update([
            'verif' => 'verified'
        ]);
        return response()->json(['data' => $user->username.' is verified' ]);
    }

    public function logout()
    {
        
        auth()->user()->tokens()->delete();
        
        return [
            'message' => Auth::user()->username.' have successfully logged out and the token was successfully deleted'
        ];
    }
 
}
