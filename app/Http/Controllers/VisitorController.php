<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        $visitor = Visitor::orderBy('id', 'ASC')->get();;
        $member = User::where('role','user')->get();
        return view('.user.visitor.index', compact('visitor', 'member'));
    }

    public function store(Request $request)
    {
        $visitor = Visitor::all();

        $user_id = $request->user_id;
        $username = $request->member_name;
        $institution = $request->institution;

        // if($request){

        // }
        // dd($request->user_id);
        if ($user_id != null) {
            $cek = User::where('id', $user_id)->first();
            // dd($cek->kelas);
            if($cek){

                $visitor = Visitor::create([
                    'user_id' => $user_id,
                    'member_name' => $cek->username,
                    'institution' => $cek->kelas,
                    'checkin_date' => date('Y-m-d H:i:s')
                ]);
            
            }
        }
        if($username != null && $institution != null){
            $visitor = Visitor::create([
                'user_id' => null,
                'member_name' => $username,
                'institution' => $institution,
                'checkin_date' => date('Y-m-d H:i:s')
            ]);
        }

        return redirect()->back();
    }
}
