<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Web GIS Sebaran Tanaman Pangan | Kabupaten Jember</title>
        <link href="{{ asset('admin') }}/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="icon" type="image/x-icon" href="{{ asset('admin') }}/assets/img/logo_polije.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
            integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
            crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin="">
        </script>
    </head>
    <body class="nav-fixed">
        <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
            <div class="container">
                <img class="img-logo ml-3" src="{{ asset('admin') }}/assets/img/logo_jti.svg"/>
                <ul class="navbar-nav align-items-center ml-auto">
                    @yield('head')
                    <li class="nav-item dropdown no-caret mr-3 d-none d-md-inline">
                        <a class="nav-link" id="navbarDropdownDocs" href="{{ route('beranda')}}">
                            <div class="d-none d-md-inline font-weight-500">{{ __('Peta Jember') }}</div>
                        </a>
                    </li>
                    {{-- <li class="nav-item dropdown no-caret mr-3 d-none d-md-inline">
                        <a class="nav-link" id="navbarDropdownDocs" href="">
                            <div class="d-none d-md-inline font-weight-500">{{ __('Tentang Kami') }}</div>
                        </a>
                    </li> --}}
                    <li class="nav-item dropdown no-caret mr-3 d-none d-md-inline">
                        <a class="nav-link" id="navbarDropdownDocs" href="{{ route('login') }}">
                            <div class="d-none d-md-inline font-weight-500">{{ __('Login Admin') }}</div>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="">
            <div id="">
                <main id="main-page">
                    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                        <div class="container">
                            <div class="page-header-contentUser pt-0">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mt-4">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i data-feather="grid"></i></div>
                                            {{ $detail->nama_kecamatan }}
                                        </h1>
                                        <div class="page-header-subtitle">{{ __('Sistem Informasi Geografis Tanaman Pangan Kabupaten Jember') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div></div>
                        </div>
                    </header>
                    <div class="container mt-n10">
                        <div class="row">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
                                <div class="card">
                                    <div class="card-header">
                                        Data Nama Kecamatan
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-10 pt-4 pt-lg-0 content">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <ul class="list-unstyled">
                                                            <li class="pb-2"><strong>Luas Lahan: </strong> {{ $LuasLahan }} Ha</li>
                                                            <li class="pb-2"><strong>Luas Panen: </strong> {{ $LuasPanen }} Ha</li>
                                                            <li class="pb-2"><strong>Produksi: </strong> {{ $Produksi }} ton</li>
                                                            <li class="pb-2"><strong>Produktivitas: </strong> {{ $Produktivitas }} Kw/Ha</li>
                                                            <li class="pb-2"><strong>Ph Tanah Rata Rata: </strong> {{ number_format( $totalph / $totaldata ,2) }} pH</li>
                                                            <li class="pb-2"><strong>Curah Hujan Rata Rata: </strong> {{ number_format($totalch / $totaldata,2) }} mm</li>
                                                            <li class="pb-2"><strong>Suhu Rata Rata: </strong> {{ number_format($totalsuhu / $totaldata , 2) }} °C</li>
                                                            {{-- <li class="pb-2"><strong>Ph Tanah: </strong> {{ $detaillahan->ph  }} pH</li> --}}

                                                            {{-- <li class="pb-2"><strong>Curah Hujan: </strong> {{ $detaillahan->ch  }} mm</li>
                                                            <li class="pb-2"><strong>Suhu: </strong> {{ $detaillahan->suhu   }} °C</li> --}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
                                <div class="card h-100">
                                    <div class="card-map h-100 d-flex flex-column justify-content-center">
                                        <div class="align-items-center">
                                            <div id="map"></div>
                                            <style>
                                                #map { width: 100%; height: 60vh; }
                                                .info { padding: 6px 8px; font: 14px/16px Arial, Helvetica, sans-serif; background: white; background: rgba(255,255,255,0.8); box-shadow: 0 0 15px rgba(0,0,0,0.2); border-radius: 5px; } .info h4 { margin: 0 0 5px; color: #777; }
                                                .legend { text-align: left; line-height: 18px; color: #555; } .legend i { width: 18px; height: 18px; float: left; margin-right: 8px; opacity: 0.7; }
                                            </style>
                                            <script>
                                                var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                                                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                                                        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                                                        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                                    id: 'mapbox/streets-v11'
                                                });
// ########## KECAMATAN ########## //
                                                var vector_kecamatan = L.layerGroup();

                                                // @foreach ($detail as $data)
                                                    // console.log($data)
                                                    L.geoJSON(<?= $detail->geojson ?>,{
                                                        style : {
                                                            color : 'black',
                                                            fillColor : '{{ $detail->warna }}',
                                                            fillOpacity : 1.0,
                                                            weight: 1,
                                                        },
                                                    }).bindPopup('<b class="text-sm">{{ $detail->nama_kecamatan }}</b><br>Padi: 123 Kw/Ha<br>Jagung: 456 Kw/Ha<br>Kedelai: 789 Kw/Ha<br>').addTo(vector_kecamatan);
                                                // @endforeach                                           
// ########## KECAMATAN ########## //
                                                var map = L.map('map', {
                                                    center: [{{ $detail->latitude }}, {{ $detail->longitude }}],
                                                    zoom: 11,
                                                    layers: [peta1, vector_kecamatan]
                                                });
                                                
                                                var baseMaps = {
                                                    "Map": peta1,
                                                };

                                                // var overlayer = {
                                                //     "Kecamatan" : vector_kecamatan,
                                                // };

                                                L.control.layers(baseMaps, overlayer).addTo(map);
// ########## LEGEND ########## //
                                                function getColor(d) {
                                                    return d == 'Padi' ? '#f4a100' :
                                                            d == 'Jagung'  ? '#f76400' :
                                                            d == 'Kedelai'  ? '#00ac69' :
                                                                        '#000000';
                                                }

                                                var legend = L.control({position: 'bottomright'});
                                              
// ########## LEGEND ########## //
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                         <div class="row">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4">
                                <div class="card card-header-actions mx-auto">
                                    <div class="card-header">
                                        Data Setiap Kecamatan
                                    </div>
                                    <div class="card-body">
                                        <div class="datatable table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Tanaman</th>
                                                        <th>Luas Lahan (Ha)</th>
                                                        <th>Luas Produksi (Ha)</th>
                                                        <th>Produksi (ton)</th>
                                                        <th>Produktivitas (Ku/Ha)</th>
                                                        <th>pH</th>
                                                        <th>Suhu</th>
                                                        <th>Curah Hujan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $no = 1;?>
                                                @foreach ($Tanaman as $data)
                                                    <tr>
                                                        <td class="text-center">{{ $no++ }}</td>
                                                        <td>{{ $data->nama_tanaman }}</td>
                                                        <td>{{ $data->luas_lahan }}</td>
                                                        <td>{{ $data->luas_panen }}</td>
                                                        <td>{{ $data->produksi }}</td>
                                                        <td>{{ $data->produktivitas }}</td>
                                                        <td>{{ $data->ph }}</td>
                                                        <td>{{ $data->suhu }}</td>
                                                        <td>{{ $data->ch }}</td>
                                                    
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
