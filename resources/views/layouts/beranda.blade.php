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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.awesome-markers/2.0.0/leaflet.awesome-markers.min.js"></script>

        <link rel="stylesheet" href="{{ asset ('assets/css/leaflet.awesome-markers.css')}}">
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
                <img class="img-logo ml-2" src="{{ asset('admin') }}/assets/img/logo_jti.svg"/>
                <ul class="navbar-nav align-items-center ml-auto">
                    @yield('head')
                    <li class="nav-item dropdown no-caret mr-3 d-none d-md-inline">
                        <a class="nav-link" id="navbarDropdownDocs" href="https://spk.devliffe.com">
                            <div class="d-none d-md-inline font-weight-500">{{ __('DSS') }}</div>
                        </a>
                    </li>
                    <li class="nav-item dropdown no-caret mr-3 d-none d-md-inline">
                        <a class="nav-link" id="navbarDropdownDocs" href="#map">
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
                            <div class="page-header-contentUser pt-3">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><img class="page-header-logo" src="{{ asset('admin') }}/assets/img/logo_jember.png"></img></div>
                                            {{ __('Sistem Informasi Geografis Tanaman Pangan Kabupaten Jember') }}
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="container mt-n10">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12 mb-4">
                                <div class="card h-100">
                                    <div class="card-map h-100 d-flex flex-column justify-content-center">
                                        <div class="align-items-center">
                                            <div id="map"></div>
                                            <style>
                                                #map { width: 100%; height: 60vh; }
                                                .info { padding: 6px 8px; font: 12px/14px Arial, Helvetica, sans-serif; background: white; background: rgba(255,255,255,0.8); box-shadow: 0 0 15px rgba(0,0,0,0.2); border-radius: 5px; }
                                                .info h4 { margin: 0 0 5px; color: #777; }
                                                .legend { text-align: left; line-height: 18px; color: #555; }
                                                .legend i { width: 16px; height: 16px; float: left; margin-right: 8px; opacity: 0.7; }
                                            </style>
                                            <script>
                                                var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                                                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                                                        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                                                        'Imagery ?? <a href="https://www.mapbox.com/">Mapbox</a>',
                                                    id: 'mapbox/streets-v11'
                                                });

                                                // var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                                                //     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                                                //         '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                                                //         'Imagery ?? <a href="https://www.mapbox.com/">Mapbox</a>',
                                                //     id: 'mapbox/satellite-v9'
                                                // });

                                                // var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                                // });

                                                // var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                                                //     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                                                //         '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                                                //         'Imagery ?? <a href="https://www.mapbox.com/">Mapbox</a>',
                                                //     id: 'mapbox/dark-v10'
                                                // });

// ########## KECAMATAN ########## //
                                                var vector_kecamatan = L.layerGroup();

                                                @foreach ($kecamatan as $data)
                                                    L.geoJSON(<?= $data->geojson ?>,{
                                                        style : {
                                                            color : 'black',
                                                            fillColor : '{{ $data->warna }}',
                                                            fillOpacity : 1.0,
                                                            weight: 1,
                                                        },
                                                    }).addTo(vector_kecamatan);
                                                    // L.geoJSON(<?= $data->geojson ?>,{
                                                    //     style : {
                                                    //         color : 'black',
                                                    //         fillColor : '{{ $data->warna }}',
                                                    //         fillOpacity : 1.0,
                                                    //         weight: 1,
                                                    //     },
                                                    // }).bindPopup('<b class="text-sm">{{ $data->nama_kecamatan }}</b><br><a class="btn btn-sm btn-primary text-white mt-2" href="/home/detail/{{ $data->id_kecamatan }}">Detail</a>').addTo(vector_kecamatan);
                                                @endforeach                                           
// ########## KECAMATAN ########## //
                                                var map = L.map('map', {
                                                    center: [-8.264371593833262, 113.6321026467762],
                                                    zoom: 10,
                                                    layers: [peta1, vector_kecamatan],
                                                });
                                                @foreach ($kecamatan as $data)
                                                // var greenIcon = L.AwesomeMarkers.icon({
                                                //     icon: 'coffee',
                                                //     markerColor: 'red'
                                                // });
                                                // var greenIcon = L.icon({
                                                //     iconUrl: ``,
                        
                                                //     iconSize:     [38, 95], // size of the icon
                                                //     shadowSize:   [50, 64], // size of the shadow
                                                //     iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
                                                //     shadowAnchor: [4, 62],  // the same for the shadow
                                                //     popupAnchor:  [-3, -76]
                                                // });
                                                var marker = L.marker([{{ $data->latitude }} , {{ $data->longitude }}]).bindPopup('<b class="text-sm">{{ $data->nama_kecamatan }}</b><br><a class="btn btn-sm btn-primary text-white mt-2" href="/home/lahan_detail/{{ $data->id_kecamatan }}">Detail</a>').addTo(map);
                                                @endforeach   
                                                var baseMaps = {
                                                    "Map": peta1,
                                                };

                                                var overlayer = {
                                                    // "Kecamatan" : vector_kecamatan,
                                                    // "Kelurahan": vector_kelurahan
                                                };

                                                L.control.layers(baseMaps, overlayer).addTo(map);
// ########## KELURAHAN ########## //
                                                var vector_kelurahan = L.layerGroup();

                                                @foreach ($kelurahan as $data)
                                                    L.geoJSON(<?= $data->geojson ?>,{
                                                        style : {
                                                            color : 'black',
                                                            fillColor : '{{ $data->warna }}',
                                                            fillOpacity : 1.0,
                                                            weight: 1,
                                                        },
                                                    }).bindPopup("{{ $data->nama_kelurahan }}").addTo(vector_kelurahan);
                                                @endforeach
// ########## KELURAHAN ########## //
// ########## LEGEND ########## //              
                                                function getColor(d) {
                                                    return  d == 'Padi' ? '#f4a100' :
                                                            d == 'Jagung'  ? '#f76400' :
                                                            d == 'Kedelai'  ? '#00ac69' :
                                                            '#000000';
                                                }

                                                var legend = L.control({position: 'bottomright'});
                                                legend.onAdd = function (map) {
                                                    var div = L.DomUtil.create('div', 'info legend leaflet-control br {clear: both;}'),
                                                    grades = ['Padi', 'Jagung', 'Kedelai'],
                                                    labels = [],
                                                    from, to;

                                                    labels.push(
                                                        @foreach ($tanaman as $data)
                                                            '<i style="background:{{ $data->warna }}' + '"></i> ' + '{{ $data->nama_tanaman }}',
                                                        @endforeach   
                                                    );
                                                    
                                                    div.innerHTML = labels.join('<br>');
                                                    return div;
                                                };
                                                legend.addTo(map);
// ########## LEGEND ########## //
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxl-3 col-lg-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="mr-3">
                                                <div class="text-white-75 small">{{ __('Total Luas Panen Kab. Jember') }}</div>
                                                <div class="text-lg font-weight-bold">{{ $luaspanen }} Ha</div>
                                            </div>
                                            <img class="feather-xl text-white-50" src="{{ asset('admin') }}/assets/img/total_lahan.svg"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-lg-6">
                                <div class="card bg-yellow text-white mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="mr-3">
                                                <div class="text-white-75 small">{{ __('Total Luas Panen Padi') }}</div>
                                                <div class="text-lg font-weight-bold">{{ $luaspadi }} Ha</div>
                                            </div>
                                            <img class="feather-xl text-white-50" src="{{ asset('admin') }}/assets/img/padi.svg"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-lg-6">
                                <div class="card bg-orange text-white mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="mr-3">
                                                <div class="text-white-75 small">{{ __('Total Luas Panen Jagung') }}</div>
                                                <div class="text-lg font-weight-bold">{{ $luasjagung }} Ha</div>
                                            </div>
                                            <img class="feather-xl text-white-50" src="{{ asset('admin') }}/assets/img/jagung.svg"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-lg-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="mr-3">
                                                <div class="text-white-75 small">{{ __('Total Luas Panen Kedelai') }}</div>
                                                <div class="text-lg font-weight-bold">{{ $luaskedelai }} Ha</div>
                                            </div>
                                            <img class="feather-xl text-white-50" src="{{ asset('admin') }}/assets/img/kedelai.svg"/>
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
        <script src="{{  asset('assets')  }}/js/leaflet.awesome-markers.js"></script>
    </body>
</html>
