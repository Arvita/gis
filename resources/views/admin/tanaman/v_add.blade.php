@extends('layouts.backend')
@section('content')
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="feather"></i></div>
                            {{ __($title) }}
                        </h1>
                        <div class="page-header-subtitle">Sistem Informasi Geografis Tanaman Pangan Kabupaten Jember</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-n10">
        <form method="POST" action="/tanaman/store" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div></div>
                <div class="card-body">
                    <div class="col-xl-12">
                        <div class="row form-group">
                            <div class="col-lg-4">
                                <label class="small mb-1" for="namaTanaman">Nama Tanaman</label>
                                <input class="form-control" id="namaTanaman" name="namaTanaman" type="text" placeholder="Nama Tanaman" />
                                <small class="text-danger" role="alert">
                                    @error('namaTanaman')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-lg-4">
                                <label class="small mb-1" for="warna">Warna Background Kecamatan (Hexcode)</label>
                                <input class="form-control" id="warna" name="warna" type="text" placeholder="Masukkan Hexcode Warna" />
                                <small class="text-danger" role="alert">
                                    @error('warna')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-lg-4">
                                <label class="small mb-1" for="logo">Icon</label>
                                <input class="form-control" id="logo" name="logo" type="file"  />
                                <small class="text-danger" role="alert">
                                    @error('logo')
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
