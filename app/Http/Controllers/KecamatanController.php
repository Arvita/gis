<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KecamatanModel;

class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->KecamatanModel = new KecamatanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kecamatan',
            'kecamatan' => $this->KecamatanModel->AllData(),
        ];
        return view('admin.kecamatan.v_index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Data Kecamatan Baru',
        ];
        return view('admin.kecamatan.v_add', $data);
    }

    public function insert()
    {
        Request()->validate(
            [
                'namaKecamatan' => 'required',
                'geojson' => 'required',
                'warna' => 'required',
            ],
            [
                'namaKecamatan.required' => 'Nama Kecamatan wajib diisi',
                'geojson.required' => 'Geo JSON wajib diisi',
                'warna.required' => 'Warna wajib diisi',
            ],
        );

        $data = [
            'nama_kecamatan' => Request()->namaKecamatan,
            'geojson' => Request()->geojson,
            'warna' => Request()->warna,
            'latitude' => Request()->lat,
            'longitude' => Request()->long,
        ];
        $this->KecamatanModel->InsertData($data);
        return redirect()->route('kecamatan')->with('message', 'Berhasil menambahkan data kecamatan!');
    }

    public function edit($id_kecamatan)
    {
        $data = [
            'title' => 'Edit Data Kecamatan',
            'kecamatan' => $this->KecamatanModel->DetailData($id_kecamatan),
        ];
        return view('admin.kecamatan.v_edit', $data);
    }

    public function update($id_kecamatan)
    {
        Request()->validate(
            [
                'namaKecamatan' => 'required',
                'geojson' => 'required',
                'warna' => 'required',
            ],
            [
                'namaKecamatan.required' => 'Nama Kecamatan wajib diisi',
                'geojson.required' => 'Geo JSON wajib diisi',
                'warna.required' => 'Warna wajib diisi',
            ],
        );

        $data = [
            'nama_kecamatan' => Request()->namaKecamatan,
            'geojson' => Request()->geojson,
            'warna' => Request()->warna,
            'latitude' => Request()->lat,
            'longitude' => Request()->long,
        ];
        $this->KecamatanModel->UpdateData($id_kecamatan, $data);
        return redirect()->route('kecamatan')->with('message', 'Berhasil mengubah data kecamatan!');
    }

    public function delete($id_kecamatan)
    {
        $this->KecamatanModel->DeleteData($id_kecamatan);
        return redirect()->route('kecamatan')->with('message', 'Berhasil menghapus data kecamatan!');
    }
}
