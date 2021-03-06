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
        <form method="POST" action="/kelurahan/update/{{ $kelurahan->id_kelurahan }}">
            @csrf
            <div class="card mb-4">
                <div></div>
                <div class="card-body">
                    <div class="col-xl-12">
                        <div class="row form-group">
                            <div class="col-lg-4">
                                <label class="small mb-1" for="id_kecamatan">Nama Kecamatan</label>
                                <select class="form-control" id="id_kecamatan" name="id_kecamatan" aria-placeholder="">
                                    {{-- <option class="mr-3" value="{{ $kelurahan->id_kecamatan }}">{{ $kelurahan->nama_kecamatan }}</option> --}}
                                    @foreach ($kecamatan as $data)
                                        <option class="mr-3" value="{{ $data->id_kecamatan }}" {{$kelurahan->id_kecamatan == $data->id_kecamatan ? 'selected' : '' }}>{{ $data->nama_kecamatan }}</option>
                                    @endforeach
                                </select>
                                <small class="text-danger" role="alert">
                                    @error('id_kecamatan')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-lg-4">
                                <label class="small mb-1" for="namaKelurahan">Nama Desa/Kelurahan</label>
                                <input class="form-control" id="namaKelurahan" name="namaKelurahan" value="{{ $kelurahan->nama_kelurahan }}" type="text" placeholder="Nama Desa/Kelurahan" />
                                <small class="text-danger" role="alert">
                                    @error('namaKelurahan')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-lg-4">
                                <label class="small mb-1" for="warna">Warna Background Desa/Kelurahan (Hexcode)</label>
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
                                <textarea class="form-control" id="geojson" name="geojson" type="text" rows="10" placeholder="Geo JSON">
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
@endsection
