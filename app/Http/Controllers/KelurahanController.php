<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelurahanModel;

class KelurahanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->KelurahanModel = new KelurahanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelurahan',
            'kelurahan' => $this->KelurahanModel->AllData(),
        ];
        return view('admin.kelurahan.v_index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Data Kelurahan Baru',
        ];
        return view('admin.kelurahan.v_add', $data);
    }

    public function insert()
    {
        Request()->validate(
            [
                'namaKelurahan' => 'required',
                'geojson' => 'required',
                'warna' => 'required',
            ],
            [
                'namaKelurahan.required' => 'Nama Kelurahan wajib diisi',
                'geojson.required' => 'Geo JSON wajib diisi',
                'warna.required' => 'Warna wajib diisi',
            ],
        );

        $data = [
            'nama_kelurahan' => Request()->namaKelurahan,
            'geojson' => Request()->geojson,
            'warna' => Request()->warna,
        ];
        $this->KelurahanModel->InsertData($data);
        return redirect()->route('kelurahan')->with('message', 'Berhasil menambahkan data kelurahan!');
    }

    public function edit($id_kelurahan)
    {
        $data = [
            'title' => 'Edit Data Kelurahan',
            'kelurahan' => $this->KelurahanModel->DetailData($id_kelurahan),
        ];
        return view('admin.kelurahan.v_edit', $data);
    }

    public function update($id_kelurahan)
    {
        Request()->validate(
            [
                'namaKelurahan' => 'required',
                'geojson' => 'required',
                'warna' => 'required',
            ],
            [
                'namaKelurahan.required' => 'Nama Kelurahan wajib diisi',
                'geojson.required' => 'Geo JSON wajib diisi',
                'warna.required' => 'Warna wajib diisi',
            ],
        );

        $data = [
            'nama_kelurahan' => Request()->namaKelurahan,
            'geojson' => Request()->geojson,
            'warna' => Request()->warna,
        ];
        $this->KelurahanModel->UpdateData($id_kelurahan, $data);
        return redirect()->route('kelurahan')->with('message', 'Berhasil mengubah data kelurahan!');
    }

    public function delete($id_kelurahan)
    {
        $this->KelurahanModel->DeleteData($id_kelurahan);
        return redirect()->route('kelurahan')->with('message', 'Berhasil menghapus data kelurahan!');
    }
}
