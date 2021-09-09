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
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data = [
            'title' => 'Lahan',
            'lahan' => $this->LahanModel->DataLahan(),
        ];
        return view('admin.lahan.v_index', $data);
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Lahan',
            'tanaman' => $this->LahanModel->getAllTanaman(),
            'data' => $this->LahanModel->DetailData($id),
        ];
        return view('admin.lahan.v_detail', $data);
    }
    public function add()
    {
        $data = [
            'title' => 'Tambah Data Lahan Baru',
            'tanaman' => $this->LahanModel->getAllTanaman(),
            'kecamatan' => $this->LahanModel->getAllKecamatan()
        ];
        return view('admin.lahan.v_add', $data);
    }

    public function insert()
    {
        Request()->validate(
            [
                'id_kecamatan' => 'required',
                'id_tanaman' => 'required',
                'luas_lahan' => 'required',
            ],
            [
                'id_kecamatan.required' => 'Kecamatan wajib dipilih',
                'id_tanaman.required' => 'Tanaman wajib dipilih',
                'luas_lahan.required' => 'Luas lahan wajib diisi',
            ],
        );

        $data = [
            'id_kecamatan' => Request()->id_kecamatan,
            'id_tanaman' => Request()->id_tanaman,
            'luas_lahan' => Request()->luas_lahan,
            'luas_panen' => Request()->luas_panen,
            'produksi' => Request()->produksi,
            'produktivitas' => Request()->produktivitas,
            'ph' => Request()->ph,
            'suhu' => Request()->suhu,
            'dh' => Request()->dh,
            'created_at' => Date('Y-m-d H:i:s')
        ];
        $this->LahanModel->InsertData($data);
        return redirect()->route('lahan')->with('message', 'Berhasil menambahkan data lahan!');
    }

    public function edit($id_lahan)
    {
        $data = [
            'title' => 'Edit Data Lahan',
            'lahan' => $this->LahanModel->DetailData($id_lahan),
            'tanaman' => $this->LahanModel->getAllTanaman(),
            'kecamatan' => $this->LahanModel->getAllKecamatan()
        ];
        return view('admin.lahan.v_edit', $data);
    }

    public function update($id_lahan)
    {
        Request()->validate(
            [
                'id_kecamatan' => 'required',
                'id_tanaman' => 'required',
                'luas_lahan' => 'required',
            ],
            [
                'id_kecamatan.required' => 'Kecamatan wajib dipilih',
                'id_tanaman.required' => 'Tanaman wajib dipilih',
                'luas_lahan.required' => 'Luas lahan wajib diisi',
            ],
        );

        $data = [
            'id_kecamatan' => Request()->id_kecamatan,
            'id_tanaman' => Request()->id_tanaman,
            'luas_lahan' => Request()->luas_lahan,
            'luas_panen' => Request()->luas_panen,
            'produksi' => Request()->produksi,
            'produktivitas' => Request()->produktivitas,
            'ph' => Request()->ph,
            'suhu' => Request()->suhu,
            'dh' => Request()->dh,
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
