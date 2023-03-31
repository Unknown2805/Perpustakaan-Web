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
            <div id="auth-left" class="d-flex justify-content-center mt-5">
                <div class="card card-xl shadow p-4 bg-light">
                    <div class="card-header">
                        <div class="text-center">
                            <span>
                            <img src="{{$identitas[0]->gambar ? asset($identitas[0]->gambar) : asset('/images/image.png') }}" class="avatar avatar-xl" style="height:80px;width:80px">
                            </span>
                            <h4 class="text-dark mb-4 mt-1"></h4>
                        </div>
                    </div>             
                    
                    <div class="card-body">                
                        <form action="{{ url('/visitor/add') }}" method="POST">
                            @csrf                    
                            <div class="row">
                                <div class="col-12 col-md-12 mt-1">                                    
                                    <select class="form-select" id="select">
                                        <option value="member" selected disabled>Choose Type</option>
                                        <option value="member">Member</option>
                                        <option value="non">Non Member</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-12 mt-3">
                                    <div id="select-option" hidden>                                                                       
                                        <select class="choices form-select" name="user_id">                                                                                        
                                            <optgroup label="Member Name">
                                                <option selected>Select Member</option>
                                            @foreach ($member as $m)
                                                <option value="{{$m->id}}">{{$m->nis}} | {{$m->fullname}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-12 col-md-12">
                                        <div class="row">
                                            <div class="col-12 col-md-6 d-flex justify-content-end mb-2">
                                                <input class="form-control" type="text" name="member_name" placeholder="Member Name" id="member_name" hidden autocomplete="off">
                                            </div>
                                            <div class="col-12 col-md-6 d-flex justify-content-end mb-2">
                                                <input class="form-control" type="text" name="institution" placeholder="Institution" hidden id="institution" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                                                
                            <div class="col-12 col-md-12 mt-3">
                                <button class="btn btn-primary w-100" type="submit">Submit</button>
                            </div>                    
                        </form>
                    </div>
                </div>
    
            </div>
        <script type="text/javascript">
            $('#select-id').select2({})
        </script>
        <script>
            let select = document.getElementById('select')
            select.addEventListener('input', () => {
                console.log(select.value);
                if (select.value == 'member') {
                    document.getElementById('member_name').hidden = true
    
                    document.getElementById('select-option').hidden = false
    
                    document.getElementById('institution').hidden = true
                } else {
                    document.getElementById('member_name').hidden = false
    
                    document.getElementById('select-option').hidden = true
    
                    document.getElementById('institution').hidden = false
    
                }
            })
        </script>
        
    </body>
</html>

