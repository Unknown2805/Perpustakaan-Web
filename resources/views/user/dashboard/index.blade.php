@extends('layouts.user')
@section('main')
    @php
        use App\Models\Pemberitahuan;
        use App\Models\Identitas;

        $identitas = Identitas::all();
        $pemberitahuan = Pemberitahuan::where('status','umum')->get();
    @endphp
    <div class="d-flex justify-content-between mt-3 mb-4">
        <h3>Dashboard</h3>
        <span class="text-light">{{Carbon\Carbon::now()->format('D, d-m-Y')}}</span>
    </div>
    <div class="row">
        @foreach ($pemberitahuan as $p)
            <div class="col-12 col-md-3 mb-2">
                <div class="badge bg-success p-3 w-100">
                    <p class="text-light text-bold">{{$p->isi_pemberitahuan}}</p>
                </div>
            </div>
        @endforeach
    </div>
       
        @foreach ($berita as $k)
            <div class="row">
                @if($k->bukus->count() > 0)
                    <div class="col-12 col-md-12">

                        <h3>{{$k->nama}}</h3>
                        @foreach ($k->bukus as $b)
                                <div class="col-12 col-md-3">

                                    <div class="card shadow">
                                        <div class="card-img">

                                        </div>
                                        <div class="card-body">
                                            <img src="{{ $b->gambar ? asset($b->gambar) : asset('/images/image.png') }}" alt="" class="card-img w-100" style="height:200px">
                                            <h5 class="mt-3 mb-2">{{$b->judul}}</h5>
                                            <div class="d-flex justify-content-between">

                                                <p style="font-weight:bold">{{$b->penerbit->nama }}</p>
                                                <p>{{$b->pengarang}}</p>
                                            </div>
                                            <p style="font-weight:bold">Tahun Terbit: {{$b->tahun_terbit}}</p>
                                            <p>Buku Baik: {{$b->j_buku_baik}}</p>
                                            <p>Buku Rusak: {{$b->j_buku_rusak}}</p>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                @else
                @endif
            </div>
        @endforeach

        @foreach ($identitas as $i)
        <div class="row d-flex justify-content-center mb-4">
            <img src="{{ $i->gambar ? asset($i->gambar) : asset('/images/image.png') }}" alt="" style="height:170px;width:230px;border-radius:20px;">
            <h4 class="text-center mt-3">{{$i->nama_app}}</h4>
            <p class="text-center mt-3">{{$i->alamat}} , {{$i->email_app}}</p>
        </div>
        @endforeach
        
@endsection
 