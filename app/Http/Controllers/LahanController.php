<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LahanModel;
use Illuminate\Http\Request;

class LahanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->LahanModel = new LahanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Lahan',
            'lahan' => $this->LahanModel->DataLahan(),
        ];
        return view('admin.lahan.v_index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Data Lahan Baru',
        ];
        return view('admin.lahan.v_add', $data);
    }

    public function insert()
    {
        Request()->validate(
            [
                'id_kelurahan' => 'required',
                'id_tanaman' => 'required',
                'luas_lahan' => 'required',
            ],
            [
                'id_kelurahan.required' => 'Kelurahan wajib dipilih',
                'id_tanaman.required' => 'Tanaman wajib dipilih',
                'luas_lahan.required' => 'Luas lahan wajib diisi',
            ],
        );

        $data = [
            'id_kelurahan' => Request()->id_kelurahan,
            'id_tanaman' => Request()->id_tanaman,
            'luas_lahan' => Request()->luas_lahan,
        ];
        $this->LahanModel->InsertData($data);
        return redirect()->route('lahan')->with('message', 'Berhasil menambahkan data lahan!');
    }

    public function edit($id_lahan)
    {
        $data = [
            'title' => 'Edit Data Lahan',
            'lahan' => $this->LahanModel->DetailData($id_lahan),
        ];
        return view('admin.lahan.v_edit', $data);
    }

    public function update($id_lahan)
    {
        Request()->validate(
            [
                'id_kelurahan' => 'required',
                'id_tanaman' => 'required',
                'luas_lahan' => 'required',
            ],
            [
                'id_kelurahan.required' => 'Kelurahan wajib dipilih',
                'id_tanaman.required' => 'Tanaman wajib dipilih',
                'luas_lahan.required' => 'Luas lahan wajib diisi',
            ],
        );

        $data = [
            'id_kelurahan' => Request()->id_kelurahan,
            'id_tanaman' => Request()->id_tanaman,
            'luas_lahan' => Request()->luas_lahan,
        ];
        $this->LahanModel->UpdateData($id_lahan, $data);
        return redirect()->route('lahan')->with('message', 'Berhasil mengubah data lahan!');
    }

    public function delete($id_lahan)
    {
        $this->LahanModel->DeleteData($id_lahan);
        return redirect()->route('lahan')->with('message', 'Berhasil menghapus data lahan!');
    }
}
