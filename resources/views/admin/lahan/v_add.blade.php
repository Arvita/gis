@extends('layouts.backend')
@section('content')
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="grid"></i></div>
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
                                <select class="form-control" id="id_kecamatan" name="id_kecamatan" aria-placeholder="">
                                    @foreach ($kecamatan as $kecamatan)
                                    <option class="mr-3" value="{{$kecamatan->id_kecamatan}}">{{$kecamatan->nama_kecamatan }}</option>
                                    @endforeach
                                </select>
                                <small class="text-danger" role="alert">
                                    @error('id_kecamatan')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-lg-4">
                                <label class="small mb-1" for="id_tanaman">Nama Tanaman</label>
                                <select class="form-control" id="id_tanaman" name="id_tanaman" aria-placeholder="">
                                    @foreach ($tanaman as $tanaman)
                                        <option class="mr-3" value="{{$tanaman->id_tanaman}}">{{$tanaman->nama_tanaman}}</option>
                                    @endforeach
                                </select>
                                <small class="text-danger" role="alert">
                                    @error('id_tanaman')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-lg-4">
                                <label class="small mb-1" for="luas_lahan">Luas Lahan (Ha)</label>
                                <input class="form-control" id="luas_lahan" name="luas_lahan" type="text" required placeholder="Masukkan Luas Lahan" />
                                <small class="text-danger" role="alert">
                                    @error('luas_lahan')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-4">
                                <label class="small mb-1" for="luas_panen">Luas Panen (Ha)</label>
                                <input class="form-control" id="luas_panen" name="luas_panen" type="text" required placeholder="Masukkan Luas Panen" />
                                <small class="text-danger" role="alert">
                                    @error('luas_panen')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-lg-4">
                                <label class="small mb-1" for="produksi">Produksi (ton)</label>
                                <input class="form-control" id="produksi" name="produksi" type="text" required placeholder="Masukkan Luas Produksi" />
                                <small class="text-danger" role="alert">
                                    @error('produksi')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-lg-4">
                                <label class="small mb-1" for="produktivitas">Produktivitas (Ku/Ha)</label>
                                <input class="form-control" id="produktivitas" name="produktivitas" type="text" required placeholder="Masukkan Produktivitas" />
                                <small class="text-danger" role="alert">
                                    @error('produktivitas')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-4">
                                <label class="small mb-1" for="ph">pH</label>
                                <input class="form-control" id="ph" name="ph" type="text" required placeholder="Masukkan PH" />
                                <small class="text-danger" role="alert">
                                    @error('ph')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-lg-4">
                                <label class="small mb-1" for="suhu">Suhu (°C)</label>
                                <input class="form-control" id="suhu" name="suhu" type="text" required placeholder="Masukkan Suhu" />
                                <small class="text-danger" role="alert">
                                    @error('suhu')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-lg-4">
                                <label class="small mb-1" for="ch">Curah Hujan (mm)</label>
                                <input class="form-control" id="ch" name="ch" type="text" required placeholder="Masukkan CH" />
                                <small class="text-danger" role="alert">
                                    @error('ch')
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
