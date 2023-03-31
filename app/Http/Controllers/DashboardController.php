<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Carbon\Carbon;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexA()
    {
        $anggota = User::count();
        $buku = Buku::count();
        $dipinjam = Peminjaman::whereNotNull('tgl_peminjaman')->whereNull('tgl_pengembalian')->count();
        $dikembalikan = Peminjaman::whereNotNull('tgl_pengembalian')->count();



        
        $this_month = Carbon::now()->format('Y');
        $month_p = Peminjaman::where('created_at','like', $this_month.'%')->get();

        for ($i=1; $i <= 12 ; $i++){
            $data_month_p[(int)$i]=0;
            $data_month_k[(int)$i]=0;    
        }

        foreach ($month_p as $a) {
                $bulan= explode('-',carbon::parse($a->created_at)->format('Y-m-d'))[1];                  
                $data_month_p[(int) $bulan] = $a->count('tgl_peminjaman');
                $data_month_k[(int) $bulan] = $a->count('tgl_pengembalian');

            }         

        return view('admin.dashboard.index',compact('buku','anggota','dipinjam','dikembalikan'))
        -> with('data_month_p', $data_month_p)
        -> with('data_month_k', $data_month_k);

    }

    //filter
    public function filter(Request $request)
    {
        $anggota = User::count();
        $buku = Buku::count();
        $dipinjam = Peminjaman::whereNotNull('tgl_peminjaman')->whereNull('tgl_pengembalian')->count();
        $dikembalikan = Peminjaman::whereNotNull('tgl_pengembalian')->count();   
            
        $this_month = Carbon::parse($request->date)->format('m');
        $month = Carbon::parse($request->date)->format('Y-m-d H:i:s');
        $result = Carbon::parse($month);            
        $month_p = Peminjaman::whereMonth('created_at','=', $this_month)->get();      

            for ($i=1; $i <= $result->daysInMonth ; $i++){
                $data_month_p[(int)$i]=0;
                $data_month_k[(int)$i]=0;    
            }
            
            foreach ($month_p as $a) {
                
                $bulan = explode('-',carbon::parse($a->created_at)->format('m-d'))[1];                  
                $data_month_p[(int) $bulan] = $a->count('tgl_peminjaman');
                $data_month_k[(int) $bulan] = $a->count('tgl_pengembalian');
            }

            $label_m = $result->daysInMonth;

            return view('admin.dashboard.filter',compact('buku','anggota','dipinjam','dikembalikan','label_m'))
            -> with('data_month_p', $data_month_p)
            -> with('data_month_k', $data_month_k);
            ;
                    
    }

    public function indexU()
    {
        $berita = Kategori::all();
        return view('user.dashboard.index',compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
