<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Web GIS Tanaman Pangan</title>
        <link href="{{ asset('admin') }}/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="icon" type="image/x-icon" href="{{ asset('admin') }}/assets/img/logo_polije.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <main class="login-container">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow-lg border-0 rounded-lg">
                                <div class="card-header justify-content-center">
                                    <img class="img-fluid login-logo mx-auto" src="{{ asset('admin') }}/assets/img/logo_jti.svg" alt="Logo Politeknik Negeri Jember">
                                </div>
                                <div class="card-body">
                                    <div></div>
                                    <form method="post" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label class="small mb-1" for="email">{{ __('Alamat email') }}</label>
                                            <input class="form-control @error('email') is-invalid @enderror py-4" id="email" name="email" type="email"  placeholder="Masukkan email" value="{{ old('email') }}" required autocomplete="off" autofocus/>
                                            
                                            @error('email')
                                                <small class="text-danger pl-2" role="alert">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="password">{{ __('Password') }}</label>
                                            <input class="form-control @error('password') is-invalid @enderror py-4" id="password" name="password" type="password" placeholder="Masukkan password" required autocomplete="off" />
                                            
                                            @error('password')
                                                <small class="text-danger pl-2" role="alert">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary mx-auto">{{ __('Login') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <div id="layoutAuthentication_footer">
                <footer class="footer mt-auto footer-dark center">
                    <div class="container-fluid">
                        <div class="col-md-12 align-items-center justify-content-center small">
                            Copyright &copy; Web GIS Tanaman Pangan
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
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
