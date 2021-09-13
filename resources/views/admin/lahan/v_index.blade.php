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
            @if (session('message'))
                <div class="alert alert-success mb-3" role="alert">{{ session('message') }}</div>
            @endif
        </div>
    </header>
    <div class="container mt-n10">
        <div class="card mb-4">
            <div class="card-header">
                <a class="btn btn-primary btn-sm shadow-sm" href="/lahan/add">
                    Tambah Data Lahan
                </a>
            </div>
            <div class="card-body">
                <div class="datatable">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center" width="50px">No.</th>
                                <th>Kelurahan</th>
                                <th>Tanaman</th>
                                <th class="text-center" width="100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach ($lahan as $data)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $data->nama_kecamatan }}</td>
                                    <td>{{ $data->nama_tanaman }}</td>
                                  
                                    <td class="text-center">
                                        <a href="/lahan/detail/{{ $data->id_lahan }}" class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i data-feather="zoom-in"></i></a>
                                        <a href="/lahan/edit/{{ $data->id_lahan }}" class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i data-feather="edit-2"></i></a>
                                        <button href="" onclick="confirm_modal('/lahan/delete/{{ $data->id_lahan }}')" data-toggle="modal" data-target="#modalDelete{{ $data->id_lahan }}" class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i data-feather="trash-2"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @foreach ($lahan as $data)
                        <div class="modal fade" id="modalDelete{{ $data->id_lahan }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog " role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Hapus Data Lahan</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Apakah Anda yakin untuk menghapus data lahan?</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                                        <a class="btn btn-danger" id="delete_link" type="button" href="/lahan/delete/{{ $data->id_lahan }}">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main> 
@endsection
