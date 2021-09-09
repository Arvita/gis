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
        <form method="POST" action="/kecamatan/update/{{ $kecamatan->id_kecamatan }}">
            @csrf
            <div class="card mb-4">
                <div></div>
                <div class="card-body">
                    <div class="col-xl-12">
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label class="small mb-1" for="namaKecamatan">Nama Kecamatan</label>
                                <input class="form-control" id="namaKecamatan" name="namaKecamatan" value="{{ $kecamatan->nama_kecamatan }}" type="text" placeholder="Nama Kecamatan" />
                                <small class="text-danger" role="alert">
                                    @error('namaKecamatan')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-lg-6">
                                <label class="small mb-1" for="warna">Warna Background Kecamatan (Hexcode)</label>
                                <input class="form-control" id="warna" name="warna" value="{{ $kecamatan->warna }}" type="text" placeholder="Masukkan Hexcode Warna" />
                                <input class="form-control" id="lat" name="lat" type="text" value="{{ $kecamatan->latitude }}" hidden/>
                                <input class="form-control" id="long" name="long" type="text" value="{{ $kecamatan->longitude }}" hidden/>
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
                                <textarea class="form-control" id="geojson" name="geojson" type="text" rows="10" placeholder="Geo JSON">
                                    {{ $kecamatan->geojson }}
                                </textarea>
                                <small class="text-danger" role="alert">
                                    @error('geojson') 
                                        {{ $message }} 
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div id="mapid" style="height: 600px;"></div>
                        <hr class="my-4" />
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a class="btn btn-danger" href="javascript:history.go(-1)">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
@push('after-script')
<script>
    var latitudeawal = document.getElementById("lat").value;
    var longitudeawal = document.getElementById("long").value;
    // console.log(latitudeawal);
    var mymap = L.map('mapid').setView([latitudeawal, longitudeawal], 14);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
}).addTo(mymap);
    mymap.attributionControl.setPrefix(false);
    var curLocation = [latitudeawal, longitudeawal];
    var latInput = document.querySelector("[name=lat]");
    var longInput = document.querySelector("[name=long]");
    var marker = new L.marker(curLocation , {
        draggable:'true'
    });
    marker.on('dragend' , function(event){
        var position = marker.getLatLng();
        marker.setLatLng(position , {
            draggable : 'true'
        }).bindPopup(position).update();
        console.log(position);
        $("#lat").val(position.lat);
        $("#long").val(position.lng);
    });
    mymap.addLayer(marker);
    mymap.on("click" , function(e){
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        if(!marker){
            marker = L.marker(e.latlng).addTo(mymap);
        }else {
            marker.setLatLng(e.latlng);
        }
        latInput.value= lat;
        longInput.value= lng;
    });
</script>
@endpush