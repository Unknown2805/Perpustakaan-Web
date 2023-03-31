<html>
    @php
        use App\Models\Identitas;
        $identitas = Identitas::all();
    @endphp 
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$identitas[0]->nama_app}}</title>
        <link rel="stylesheet" href="assets/css/main/app.css">
        <link rel="stylesheet" href="assets/css/pages/app-dark.css">
        <link
        rel="shortcut icon"
        href="{{$identitas[0]->gambar ? asset($identitas[0]->gambar) : asset('/images/image.png') }}"
        type="image/x-icon"
        />
        <link
            rel="shortcut icon"
            href="{{$identitas[0]->gambar ? asset($identitas[0]->gambar) : asset('/images/image.png') }}"
            type="image/png"
        />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </head>
    <body style="background-image: url('{{asset('images/landing2.jpg')}}');background-position:auto;height: 80%;background-repeat: no-repeat;background-size: 100% 100%;">
        <div class="row ms-3 mt-4">
            @foreach ($kategori as $k)
                <h2>{{$k->nama}}</h2>       
                @foreach ($k->bukus as $b)                    
                    <div class="col-6 col-md-3">
                        <div class="card shadow">
                            <div class="card-header">
                                <h4 class="mb-2">{{$b->judul}}</h4>
                                <img src="{{ $b->gambar ? asset($b->gambar) : asset('/images/image.png') }}" alt="" class="card-img" style="height:120px">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="d-flex justify-content-between">
                                        <p>{{$b->penerbit->nama}}</p>
                                        <p>{{$b->pengarang}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-flex justify-content-between">
                                        <p class="text-success">{{$b->j_buku_baik}} buku</p>
                                        <p class="text-danger">{{$b->j_buku_rusak}} buku</p>
                                    </div>
                                </div>
                                <a href="{{ url('/login') }}" class="btn btn-primary w-100">Pinjam</a>
                            </div>
                        </div>
                    </div>
                @endforeach         
            @endforeach
        </div>
    </body>
</html>

