<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <meta name="description" content="" />

        <meta name="author" content="" />

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin | Web GIS Sebaran Tanaman Pangan</title>

        <link href="{{ asset('admin') }}/css/styles.css" rel="stylesheet" />

        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

        <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet" crossorigin="anonymous" />

        <link rel="icon" type="image/x-icon" href="{{ asset('admin') }}/assets/img/logo_polije.png" />

        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>

    </head>

    <body class="nav-fixed">

        <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">

            <img class="img-logo ml-3" src="{{ asset('admin') }}/assets/img/logo_jti.svg"/>

            <ul class="navbar-nav align-items-center ml-auto">

                <li class="nav-item dropdown no-caret mr-2 dropdown-user">

                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="{{ asset('admin') }}/assets/img/user.png" /></a>

                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">

                        <h6 class="dropdown-header d-flex align-items-center">

                            <img class="dropdown-user-img" src="{{ asset('admin') }}/assets/img/user.png" />

                            <div class="dropdown-user-details">

                                <div class="dropdown-user-details-name">{{ Auth::user()->name }}</div>

                                <div class="dropdown-user-details-email">{{ Auth::user()->email }}</div>

                            </div>

                        </h6>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#!">

                            <div class="dropdown-item-icon"><i data-feather="settings"></i></div>

                            {{ __('Akun') }}

                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();

                            document.getElementById('logout-form').submit();">

                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>

                            {{ __('Logout') }}

                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                            @csrf

                        </form>

                    </div>

                </li>

            </ul>

        </nav>

        <div id="layoutSidenav">

            <div id="layoutSidenav_nav">

                <nav class="sidenav shadow-right sidenav-light">

                    <div class="sidenav-menu">

                        <div class="nav accordion" id="accordionSidenav">

                            <div class="sidenav-menu-heading">{{ __('Menu Utama') }}</div>

                            <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">

                                <div class="nav-link-icon"><i data-feather="activity"></i></div>

                                {{ __('Dashboard') }}

                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>

                            </a>

                            <div class="collapse" id="collapseDashboards" data-parent="#accordionSidenav">

                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">

                                    <a class="nav-link" href="/dashboard">

                                        {{ __('Dashboard') }}

                                    </a>

                                    <a class="nav-link" href="#!">

                                        Multipurpose

                                    </a>

                                    <a class="nav-link" href="#!">

                                        Affiliate

                                    </a>

                                </nav>

                            </div>

                            <div class="sidenav-menu-heading">{{ __('Master Data') }}</div>

                            <a class="nav-link" href="/kecamatan">

                                <div class="nav-link-icon"><i data-feather="home"></i></div>

                                {{ __('Data Kecamatan') }}

                            </a>

                            <a class="nav-link" href="/kelurahan">

                                <div class="nav-link-icon"><i data-feather="home"></i></div>

                                {{ __('Data Kelurahan') }}

                            </a>
                            <a class="nav-link" href="/tanaman">

                                <div class="nav-link-icon"><i data-feather="home"></i></div>

                                {{ __('Data Tanaman') }}

                            </a>

                        </div>

                    </div>

                    <div class="sidenav-footer">

                        <div class="sidenav-footer-content">

                            <div class="sidenav-footer-subtitle">Login sebagai:</div>

                            <div class="sidenav-footer-title">{{ Auth::user()->name }}</div>

                        </div>

                    </div>

                </nav>

            </div>

            <div id="layoutSidenav_content">

                <main>

                    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">

                        <div class="container">

                            <div class="page-header-content pt-4">

                                <div class="row align-items-center justify-content-between">

                                    <div class="col-auto mt-4">

                                        <h1 class="page-header-title">

                                            <div class="page-header-icon"><i data-feather="home"></i></div>

                                            {{ __($title) }}

                                        </h1>

                                        <div class="page-header-subtitle">Example dashboard overview and content summary</div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </header>

                    <div class="container mt-n10">

                        <form method="POST" action="/kelurahan/update/{{ $kelurahan->id_kelurahan }}">

                            @csrf

                            <div class="card mb-4">

                                <div></div>

                                <div class="card-body">

                                    <div class="col-xl-12">

                                        <div class="row form-group">

                                            <div class="col-lg-6">

                                                <label class="small mb-1" for="namaKelurahan">Nama Kelurahan</label>

                                                <input class="form-control" id="namaKelurahan" name="namaKelurahan" value="{{ $kelurahan->nama_kelurahan }}" type="text" placeholder="Nama Kelurahan" />

                                                <small class="text-danger" role="alert">

                                                    @error('namaKelurahan')

                                                        {{ $message }}

                                                    @enderror

                                                </small>

                                            </div>

                                            <div class="col-lg-6">

                                                <label class="small mb-1" for="warna">Warna Background Kelurahan (Hexcode)</label>

                                                <input class="form-control" id="warna" name="warna" value="{{ $kelurahan->warna }}" type="text" placeholder="Masukkan Hexcode Warna" />

                                                <small class="text-danger" role="alert">

                                                    @error('warna')

                                                        {{ $message }}

                                                    @enderror

                                                </small>

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div class="form-group">

                                                <label class="small mb-1" for="geojson">Geo JSON</label>

                                                <textarea class="form-control" id="geojson" name="geojson" type="text" rows="4" placeholder="Geo JSON">

                                                    {{ $kelurahan->geojson }}

                                                </textarea>

                                                <small class="text-danger" role="alert">

                                                    @error('geojson')

                                                        {{ $message }}

                                                    @enderror

                                                </small>

                                            </div>

                                        </div>

                                        <hr class="my-4" />

                                        <button class="btn btn-primary" type="submit">Simpan</button>

                                        <a class="btn btn-danger" href="javascript:history.go(-1)">Batal</a>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </main>

                <footer class="footer mt-auto footer-light">

                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-md-12 text-md-right small">

                                Copyright &copy; Web SIG Tanaman Pangan

                                <script>

                                    document.write(new Date().getFullYear());

                                </script>

                            </div>

                        </div>

                    </div>

                </footer>

            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        <script src="{{ asset('admin') }}/js/scripts.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" crossorigin="anonymous"></script>

        <script src="{{ asset('admin') }}/assets/demo/chart-area-demo.js"></script>

        <script src="{{ asset('admin') }}/assets/demo/chart-bar-demo.js"></script>

        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>

        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

        <script src="{{ asset('admin') }}/assets/demo/datatables-demo.js"></script>

        <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>

        <script src="{{ asset('admin') }}/assets/demo/date-range-picker-demo.js"></script>

    </body>

</html>



