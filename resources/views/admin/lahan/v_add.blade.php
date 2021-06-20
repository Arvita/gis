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
                                <label class="small mb-1" for="id_kelurahan">Nama Desa/Kelurahan</label>
                                <select class="form-control" id="id_kelurahan" name="id_kelurahan" aria-placeholder="">
                                    <option class="mr-3" value="">{{ __('Nama Desa/Kelurahan') }}</option>
                                        <option class="mr-3" value="">{{ __('Nama Desa/Kelurahan') }}</option>
                                </select>
                                <small class="text-danger" role="alert">
                                    @error('id_kelurahan')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-lg-4">
                                <label class="small mb-1" for="id_tanaman">Nama Tanaman</label>
                                <select class="form-control" id="id_tanaman" name="id_tanaman" aria-placeholder="">
                                    <option class="mr-3" value="">{{ __('Nama Tanaman') }}</option>
                                        <option class="mr-3" value="">{{ __('Nama Tanaman') }}</option>
                                </select>
                                <small class="text-danger" role="alert">
                                    @error('id_tanaman')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-lg-4">
                                <label class="small mb-1" for="luas_lahan">Luas Lahan (Ha)</label>
                                <input class="form-control" id="luas_lahan" name="luas_lahan" type="text" placeholder="Masukkan Luas Lahan" />
                                <small class="text-danger" role="alert">
                                    @error('luas_lahan')
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