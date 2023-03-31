<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;
use App\Models\User;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username(){
        return 'username';
    }
    public function authenticated(Request $request,$user){
        if($user->verif === "verified"){
            if($user->role === "admin"){
                User::find($user->id)->update([
                    'terakhir_login' => Carbon::now()->format('Y-m-d')
                ]);
                return redirect()->route('admin.dashboard');
            }
            User::find($user->id)->update([
                'terakhir_login' => Carbon::now()->format('Y-m-d')
            ]);
            return redirect()->route('user.dashboard');
        }
        Auth::logout();
        toast()->error('FAILED','User is Unverified')->position('top');
            return redirect()->back();
        

    }
}
