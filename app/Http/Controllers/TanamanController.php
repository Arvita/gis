<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TanamanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

class TanamanController extends Controller
{
    public function __construct()
    {
        $this->TanamanModel = new TanamanModel();
        $this->middleware('auth');
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        $data = [
            'title' => 'Tanaman',
            'tanaman' => $this->TanamanModel->getAllData(),
            'kelurahan' => $this->TanamanModel->AllData()
        ];
        return view('admin.tanaman.v_index', $data);
        // echo "tanaman";
    }
    public function add()
    {
        $data = [
            'title' => 'Tambah Tanaman',
            'warna' => 'Warna',
        ];
        return view('admin.tanaman.v_add', $data);
    }
    public function store()
    {
        Request()->validate([
            'namaTanaman' => 'required',
            'warna' => 'required',
            'logo' => 'mimes:jpg,jpeg,png|max:2048',
        ], [
            'namaTanaman.required' => 'Nama Tanaman wajib diisi',
            'warna.required' => 'Warna wajib diisi',
        ]);
        $key =  Str::random(10);
        if (Request()->logo <> "") {
            $file = Request()->logo;
            $filename = 'assets/tanaman' . '/' . $key . '.' . $file->extension();
            $file->move(public_path('assets/tanaman'), $filename);

            $data = [
                'nama_tanaman' => Request()->namaTanaman,
                'warna' => Request()->warna,
                'logo' => $filename,
                "created_at" => Date("Y-m-d H:i:s")
            ];
            $this->TanamanModel->insertData($data);
        } else {
            $data = [
                'nama_tanaman' => Request()->namaTanaman,
                'warna' => Request()->warna,
                'logo' => "",
                "created_at" => Date("Y-m-d H:i:s")
            ];
            $this->TanamanModel->insertData($data);
        }
        return redirect()->route('tanaman')->with('pesan', 'Data Berhasil Ditambahkan');
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Tanaman',
            'warna' => 'Warna',
            'tanaman' => $this->TanamanModel->detail($id)
        ];
        return view('admin.tanaman.v_edit', $data);
    }
    public function update($id)
    {
        Request()->validate([
            'namaTanaman' => 'required',
            'warna' => 'required',
            'logo' => 'mimes:jpg,jpeg,png|max:2048',
        ], [
            'namaTanaman.required' => 'Nama Tanaman wajib diisi',
            'warna.required' => 'Warna wajib diisi',
        ]);
        $key =  Str::random(10);
        if (Request()->logo <> "") {
            $file = Request()->logo;
            $filename = 'assets/tanaman' . '/' . $key . '.' . $file->extension();
            $file->move(public_path('assets/tanaman'), $filename);

            $data = [
                'nama_tanaman' => Request()->namaTanaman,
                'warna' => Request()->warna,
                'logo' => $filename,
            ];
            $this->TanamanModel->updateData($data, $id);
        } else {
            $data = [
                'nama_tanaman' => Request()->namaTanaman,
                'warna' => Request()->warna,
            ];
            $this->TanamanModel->updateData($data, $id);
        }
        return redirect()->route('tanaman')->with('pesan', 'Data Berhasil Ditambahkan');
    }
    public function deleteData($id)
    {
        $this->TanamanModel->deleteData($id);
        return redirect()->route('tanaman')->with('pesan', 'Data Berhasil Di Hapus');
    }
}
