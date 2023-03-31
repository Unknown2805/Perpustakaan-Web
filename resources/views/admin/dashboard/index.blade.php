@extends('layouts.master')
@section('main')
@php
    use App\Models\Identitas;
    $identitas = Identitas::all();
@endphp
    <div class="d-flex justify-content-between">

        <h3>Dashboard</h3>
        <span class="text-light">{{Carbon\Carbon::now()->format('D, d-m-Y')}}</span>
    </div>
    <div class="row">
        <div class="col-12 col-md-3">
            <a href="{{url('/admin/anggota/user')}}">
                <div class="card shadow">
                    <div class="card-header">
                        <h3>
                            {{$anggota}}
                        </h3>
                        <h6>
                            Anggota
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <h6>More Info</h6>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-3">
            <a href="{{url('/admin/buku')}}">
                <div class="card shadow">
                    <div class="card-header">
                        <h3>{{$buku}}</h3>
                        <h6>Buku</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <h6>More Info</h6>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-3">
            <a href="{{url('/admin/peminjaman')}}">
                <div class="card shadow">
                    <div class="card-header">
                        <h3>{{$dipinjam}}</h3>
                        <h6>Peminjaman</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <h6>More Info</h6>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-3">
            <a href="{{url('/admin/peminjaman')}}">
                <div class="card shadow">
                    <div class="card-header">
                        <h3>{{$dikembalikan}}</h3>
                        <h6>Pengembalian</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <h6>More Info</h6>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>


    {{-- Chart --}}
        <div class="col-12 col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    
                        <form action="{{ route('admin.dashboard.filter') }}"method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-3 col-md-3">
                                    <div class="text-start">

                                        <h6>Rekap Peminjaman</h6>
                                    </div>
                                </div>
                                <div class="col-4 col-md-4">
                                    <div class="text-end">
                                        <a href="{{ url('/admin/dashboard')}}" class="btn btn-outline-primary w-25">default</a>

                                    </div>
                                </div>
                                <div class="col-2 col-md-3">
                                    <div class="text-end">
                                        <input id="datepicker" name="date" class="form-control w-100" autocomplete="off"/>
                                    </div>
                                </div>

                                <div class="col-1 col-md-2">

                                    <button type="submit" class="btn btn-outline-warning w-100">filter</button>
                                </div>
                            </div>                                      
                        </form>
                </div>


                <div class="card-body">

                    <div class="row">


                        <div class="col-12 col-md-12">
                            <div class="text-center">
                                <canvas id="chart_peminjaman" class="w-100"></canvas>
                            </div>
                        </div>


                    </div>

                </div>

            </div>
        </div>



    @foreach ($identitas as $i)
        <div class="row d-flex justify-content-center">

            <img src="{{ $i->gambar ? asset($i->gambar) : asset('/images/image.png') }}" alt="" style="height:170px;width:230px;border-radius:20px;">
            <h4 class="text-center mt-3">{{$i->nama_app}}</h4>
            <p class="text-center mt-3">{{$i->alamat}} , {{$i->email_app}}</p>

        </div>
    @endforeach


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.14.305/pdf.min.js"
            integrity="sha512-dw+7hmxlGiOvY3mCnzrPT5yoUwN/MRjVgYV7HGXqsiXnZeqsw1H9n9lsnnPu4kL2nx2bnrjFcuWK+P3lshekwQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- script chart --}}
    <script>
            const peminjaman = [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ];
         

            const peminjamand = {
                labels: peminjaman,
                datasets: [{
                    label: 'Peminjaman',
                    backgroundColor: '#43beaf',
                    borderRadius: 4,
                    barThickness: 10,

                    data: [
                        @foreach ($data_month_p as $p)
                            {{ $p }},
                        @endforeach
                    ]
                }, {
                    label: 'Pengembalian',
                    backgroundColor: '#dc3545',
                    borderRadius: 4,
                    barThickness: 10,
                    data: [
                        @foreach ($data_month_k as $k)
                            {{ $k }},
                        @endforeach
                    ],
                }]
            };

            const bar_peminjaman = {
                type: 'bar',
                data: peminjamand,
                options: {
                    responsive: true,
                    indexAxis: 'x',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                            },
                        },
                    },
                }
            };
    </script>
    <script>
            const bulanan_products = new Chart(
                document.getElementById('chart_peminjaman'),
                bar_peminjaman
            );
    </script>
@endsection
