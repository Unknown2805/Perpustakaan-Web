<!DOCTYPE html>
<html lang="en">
@php
    use App\Models\Identitas;
    use App\Models\Pemberitahuan;

    $identitas = Identitas::all();
    $pemberitahuan = Pemberitahuan::where('status','umum')->limit(5)->get();
    $status = $pemberitahuan->count();
@endphp

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$identitas[0]->nama_app}}</title>

    <link rel="stylesheet" href="/assets/css/main/app.css" />
    <link rel="stylesheet" href="/assets/css/main/app-dark.css" />
    <link rel="stylesheet" href="/assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="/assets/css/pages/simple-datatables.css">

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
  </head>

<body style="background-image: url('{{asset('images/landing2.jpg')}}');background-position:auto;height: 80%;background-repeat: no-repeat;background-size: 100% 40%;">
    <div id="app">
      <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
          <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
              <div class="logo">
                <a href="#">
                  @foreach ($identitas as $i)
                    <img src="{{ $i->gambar ? asset($i->gambar) : asset('/images/image.png') }}" alt="" class="card-img" style="width:120px;height:60px;border-radius:4px;">
                  @endforeach
                </a>
              </div>
              <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                  aria-hidden="true"
                  role="img"
                  class="iconify iconify--system-uicons"
                  width="20"
                  height="20"
                  preserveAspectRatio="xMidYMid meet"
                  viewBox="0 0 21 21"
                >
                  <g
                    fill="none"
                    fill-rule="evenodd"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path
                      d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                      opacity=".3"
                    ></path>
                    <g transform="translate(-210 -1)">
                      <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                      <circle cx="220.5" cy="11.5" r="4"></circle>
                      <path
                        d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"
                      ></path>
                    </g>
                  </g>
                </svg>
                <div class="form-check form-switch fs-6">
                  <input
                    class="form-check-input me-0"
                    type="checkbox"
                    id="toggle-dark"
                    style="cursor: pointer"
                  />
                  <label class="form-check-label"></label>
                </div>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                  aria-hidden="true"
                  role="img"
                  class="iconify iconify--mdi"
                  width="20"
                  height="20"
                  preserveAspectRatio="xMidYMid meet"
                  viewBox="0 0 24 24"
                >
                  <path
                    fill="currentColor"
                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"
                  ></path>
                </svg>
              </div>
              <div class="sidebar-toggler x">
                <a href="#" class="sidebar-hide d-xl-none d-block"
                  ><i class="bi bi-x bi-middle"></i
                ></a>
              </div>
            </div>
          </div>
          <div class="sidebar-menu">
            <ul class="menu">
              <li class="sidebar-title"><b>{{$identitas[0]->nama_app}}</b></li>

              <li class="sidebar-item">
                <a href="{{url('/user/dashboard')}}" class="sidebar-link">
                  <i class="bi bi-grid-fill"></i>
                  <span>Dashboard</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="{{url('/user/peminjaman')}}" class="sidebar-link">
                  <i class="bi bi-book-fill"></i>
                  <span>Peminjaman</span>
                </a>
              </li>
              <li class="sidebar-item has-sub">
                <a href="#" class="sidebar-link">
                  <i class="bi bi-envelope-fill"></i>
                  <span>Pesan</span>
                </a>
                <ul class="submenu">
                  <li class="submenu-item">
                    <a href="{{url('/user/pesan/masuk')}}">Pesan Masuk</a>
                  </li>
                  <li class="submenu-item">
                    <a href="{{url('/user/pesan/keluar')}}">Pesan Keluar</a>
                  </li>
                </ul>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="bi bi-arrow-left-circle-fill"></i>
                                <span>Keluar</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div id="main" class="layout-navbar navbar-fixed">
        <header class="mb-3">
          <nav class="navbar navbar-expand-lg navbar-darkp">
            <div class="container-fluid">
              <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
              </a>

              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
              <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-lg-0">

                  <li class="nav-item dropdown me-3">
                    <span class="position-absolute mt-2 start-100 translate-middle badge badge-sm rounded-pill bg-danger" style="font-size:8px">{{$status}}</span>
                    <a class="nav-link active text-light" href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <i class='bi bi-bell bi-sub fs-4'></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end notification-dropdown" aria-labelledby="dropdownMenuButton">
                        @if($pemberitahuan->count() > 0)
                            <li class="dropdown-header">
                                <h6>Pemberitahuan</h6>
                            </li>
                            @foreach ($pemberitahuan as $p)
                                <li class="dropdown-item notification-item">
                                    <a class="d-flex align-items-center" href="#">
                                        <div class="badge bg-warning rounded-circle">
                                            <i class="bi bi-bell-fill bi-sub" style="font-size:22px"></i>
                                        </div>
                                        <div class="notification-text ms-4">
                                            <p class="notification-title" style="font-size: 15px">{{$p->isi_pemberitahuan}}</p>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        @else
                                <li class="dropdown-header">
                                    <h6>Pemberitahuan</h6>
                                </li>
                                <li class="dropdown-item notification-item">
                                    <a class="d-flex align-items-center" href="#">

                                        <div class="notification-text ms-4 text-center">
                                            <p class="notification-title" style="font-size: 15px">belum ada pemberitahuan</p>
                                        </div>
                                    </a>
                                </li>
                        @endif

                    </ul>
                  </li>

                        <a class="btn" data-bs-toggle="modal" data-bs-target="#editProfile{{Auth::user()->id}}">
                            <div class="user-menu d-flex">
                                <div class="user-name text-end me-3">
                                    <h6 class="mb-0 text-light">{{Auth::user()->fullname}}</h6>
                                    <p class="mb-0 text-sm text-light">{{Auth::user()->role}}</p>
                                </div>
                            </div>
                        </a>

                </ul>
              </div>
            </div>
          </nav>

        </header>
        <div id="main-content">
            @yield('main')

        </div>
      </div>
    </div>


    <div class="modal fade" id="editProfile{{Auth::user()->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('/user/profile/edit/'.Auth::user()->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
              <div class="row">
                  <div class="col-6 col-md-6">
                      <label>FullName</label>
                      <input type="text" name="fullname" class="form-control" value="{{Auth::user()->fullname}}">
                  </div>
                  <div class="col-6 col-md-6">
                      <label>Username</label>
                      <input type="text" name="username" class="form-control" value="{{Auth::user()->username}}">
                  </div>
              </div>
              <div class="row">
                  <div class="col-6 col-md-6">
                      <label>Join date</label>
                      <input value="{{ Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control" disabled>
                  </div>
                  <div class="col-6 col-md-6">
                      <label>Role</label>
                      <input value="{{Auth::user()->role}}" class="form-control" disabled>
                  </div>
              </div>
              <div class="row">
                  <div class="col-6 col-md-6">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control">
                  </div>
                  <div class="col-6 col-md-6">
                          <label>NIS</label>
                          <input name="nis" class="form-control" value="{{Auth::user()->nis}}">
                  </div>
              </div>
              <div class="row">
                <div class="col-6 col-md-6">
                    <label>Kelas</label>
                    <input type="text" name="kelas" class="form-control" value="{{Auth::user()->kelas}}">
                </div>
                <div class="col-6 col-md-6">
                    <label>Alamat</label>
                    <textarea name="alamat" id="" cols="30" rows="3" class="form-control">{{Auth::user()->alamat}}</textarea>
                </div>
              </div>
            </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save changes</button>
                </div>
        </form>

        </div>
    </div>
    </div>
    @include('sweetalert::alert')
    <script src="/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/assets/js/pages/simple-datatables.js"></script>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/app.js"></script>

  </body>
</html>
