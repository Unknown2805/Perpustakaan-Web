<!DOCTYPE html>
<html lang="en">
@php
    use App\Models\Identitas;
    $identitas = Identitas::all();
@endphp
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$identitas[0]->nama_app}}</title>
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
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
            <div id="auth">
                <div id="auth-left" class="d-flex justify-content-center mt-5">
                    <div class="card card-xl shadow p-4 bg-light">
                        <div class="card-body">
                            <div class="text-center">
                                @foreach ($identitas as $i)
                                <h4>{{$i->nama_app}}</h4>
                                @endforeach
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">

                                    <label class="col-md-4 col-form-label text-start">Username</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-start">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="row mb-2">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary w-75">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="row mb-2">
                                <div class="d-flex justify-content-center">
                                    Or
                                </div>
                            </div>
                            <div class="row">

                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-primary w-75" data-bs-toggle="modal" data-bs-target="#register">
                                        Register
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </body>
@include('sweetalert::alert')
@include('auth.modal')
</html>
