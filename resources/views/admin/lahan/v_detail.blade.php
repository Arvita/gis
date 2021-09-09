@extends('layouts.backend')
@section('content')
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
                        <div class="page-header-subtitle">Sistem Informasi Geografis Tanaman Pangan Kabupaten Jember</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-n10">
        <form method="POST" action="/lahan/insert">
            @csrf
            <div class="card mb-4">
                <div></div>
                <div class="card-body">
                    <div class="col-xl-12">
                        <div class="row form-group">
                            <div class="col-lg-4">
                                <label class="small mb-1" for="id_kecamatan">Nama Kecamatan</label>
                                <p><b>{{ $data->nama_kecamatan }}</b></p>
                            </div>
                            <div class="col-lg-4">
                                <label class="small mb-1" for="id_tanaman">Nama Tanaman</label>
                                <p><b>{{ $data->nama_tanaman }}</b></p>
                            </div>
                            <div class="col-lg-4">
                                <label class="small mb-1" for="luas_lahan">Luas Lahan (Ha)</label>
                                <p><b>{{ $data->luas_lahan }}</b></p>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-4">
                                <label class="small mb-1" for="luas_panen">Luas Panen (Ha)</label>
                                <p><b>{{ $data->luas_panen }}</b></p>
                            </div>
                            <div class="col-lg-4">
                                <label class="small mb-1" for="produksi">Produksi (ton)</label>
                                <p><b>{{ $data->produksi }}</b></p>
                            </div>
                            <div class="col-lg-4">
                                <label class="small mb-1" for="produktivitas">Produktivitas (Ku/Ha)</label>
                                <p><b>{{ $data->produktivitas }}</b></p>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-4">
                                <label class="small mb-1" for="ph">PH</label>
                                <p><b>{{ $data->ph }}</b></p>
                            </div>
                            <div class="col-lg-4">
                                <label class="small mb-1" for="suhu">Suhu</label>
                                <p><b>{{ $data->suhu }}</b></p>
                            </div>
                            <div class="col-lg-4">
                                <label class="small mb-1" for="dh">DH</label>
                                <p><b>{{ $data->dh }}</b></p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="card mb-4">
                <div class="card-body">
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
    
                            L.geoJSON(<?= $data->geojson ?>,{
                                style : {
                                    color : 'black',
                                    fillColor : '{{ $data->warna }}',
                                    fillOpacity : 1.0,
                                    weight: 1,
                                },
                            }).bindPopup('<b class="text-sm">{{ $data->nama_kecamatan }}</b>').addTo(vector_kecamatan);
                           
    // ########## KECAMATAN ########## //
                            var map = L.map('map', {
                                center: [{{$data->latitude}}, {{$data->longitude}}],
                                zoom: 12,
                                layers: [peta1, vector_kecamatan]
                            });
                            
                            var baseMaps = {
                                "Map": peta1,
                            };
    
                            var overlayer = {
                                "Kecamatan" : vector_kecamatan,
                            };
    
                            L.control.layers(baseMaps, overlayer).addTo(map);
                            var greenIcon = L.icon({
                                iconUrl: `http://127.0.0.1:8000/{{$data->logo}}`,
    
                                iconSize:     [60, 60], // size of the icon
                                shadowSize:   [60, 60], // size of the shadow
                                iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
                                shadowAnchor: [4, 62],  // the same for the shadow
                                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
                            });
                            L.marker([{{$data->latitude}}, {{$data->longitude}}], {icon: greenIcon}).addTo(map);
    // ########## LEGEND ########## //
                            function getColor(d) {
                                return d == 'Padi' ? '#f4a100' :
                                        d == 'Jagung'  ? '#f76400' :
                                        d == 'Kedelai'  ? '#00ac69' :
                                                    '#000000';
                            }
    
                            var legend = L.control({position: 'bottomright'});
                            legend.onAdd = function (map) {
                                var div = L.DomUtil.create('div', 'info legend'),
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
        </form>
    </div>
    
    </div>
    
</div>
</main>
@endsection
