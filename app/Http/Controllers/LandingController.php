<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Pemberitahuan;

class LandingController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        $pemberitahuan = Pemberitahuan::all();

        return view('user.landing.index',compact('kategori','pemberitahuan'));
    }
}
