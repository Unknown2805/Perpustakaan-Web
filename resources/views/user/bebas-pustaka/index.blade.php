<!DOCTYPE html>
<html lang="en">
  @php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;
    use App\Models\Identitas;
    $identitas = Identitas::all();

  @endphp
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

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

    <title>{{$identitas[0]->nama_app }} - {{Auth::user()->fullname}}</title>

  </head>

    <body>
        <table>

            <tbody>
                <tr>
                    @foreach ($identitas as $i)                
                    <td>
                        <img src="{{$i->gambar ? public_path($i->gambar) : public_path('/images/image.png')}}" style="width:100px;height:100px;border-radius:20px;margin-right:270px" >
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        <span>
                            <p class="text-center" style="font-size:30px">{{$i->nama_app}}</p>
                            <p class="text-center" style="font-size:18px">{{$i->alamat}}, {{$i->nomor_hp}}</p>
                            <p class="text-center" style="font-size:16px">{{$i->email_app}}</p>
                        </span>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
            <div class="row">
            
                <div class="col-12 col-md-12">
                    <h1 class="text-center">
                    </h1>
                  
                </div>
                
            </div>                 
        <hr/>

        <div class="text-center">
            <h4>Surat Keterangan Bebas Pustaka</h4>
        </div>
        <p class="mt-4">
            Yang bertanda tangan di bawah ini menerangkan bahwa:
        </p>
            <div class="ml-5">
                <table class="mb-2">
                    <tbody>
                        <tr>
                            <td>ID Member</td>
                            <td>: {{Auth::user()->kode_user}}</td>
                        </tr>
                        <tr>
                            <td>Nama Member</td>
                            <td>: {{Auth::user()->fullname}}</td>
                        </tr>
                        <tr>
                            <td>Kelas Member</td>
                            <td>: {{Auth::user()->kelas}}</td>
                        </tr>
                    </tbody>
                </table>            
            </div>

            <p class="mb-4">
                Siswa Tersebut di atas tidak mempunyai pinjaman pustaka milik <b>{{$i->nama_app}}</b>.<br>
                Surat keterangan ini untuk: Wisuda, Pengambilan Ijazah, Pengambilan Transkrip Nilai.
            </p>

            <table>
                <tbody>
                    <tr>
                        <td style="width:820px">
                            <img src="data:image/png;base64, {!! base64_encode(QrCode::size(150)->generate('http://127.0.0.1:8000/login')) !!} ">
                        </td>
                        <td>
                            <span class="text-left">
                                Jakarta,..........<br>
                                Kepala Perpustakaan<br>
                                <br>
                                <br>    
                                <br>   
                                <br>      
                                ....................
                                </span>
                        </td>
                    </tr>
                </tbody>
            </table>


                

    </body>
</html>