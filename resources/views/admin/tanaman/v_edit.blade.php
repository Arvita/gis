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
                        <div class="page-header-subtitle">Example dashboard overview and content summary</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-n10">
        <form method="POST" action="/tanaman/update/{{$tanaman->id_tanaman}}" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div></div>
                <div class="card-body">
                    <div class="col-xl-12">
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label class="small mb-1" for="namaTanaman">Nama Tanaman</label>
                                <input class="form-control" id="namaTanaman" name="namaTanaman" type="text" placeholder="Nama Tanaman" value="{{$tanaman->nama_tanaman}}"/>
                                <small class="text-danger" role="alert">
                                    @error('namaTanaman')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-lg-6">
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
