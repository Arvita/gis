<?php

namespace App\Http\Controllers;

use App\Models\BerandaModel;
use Illuminate\Http\Request;
use App\Models\DataKecamatanModel;

class BerandaController extends Controller
{
    public function __construct()
    {
        $this->BerandaModel = new BerandaModel();
        $this->DataKecamatanModel = new DataKecamatanModel();
    }

    public function index()
    {
        $data = [
            'kecamatan' => $this->BerandaModel->DataKecamatan(),
            'kelurahan' => $this->BerandaModel->DataKelurahan(),
            'tanaman' => $this->BerandaModel->DataTanaman(),
            'pinMaps' => $this->DataKecamatanModel->pinMaps(),

            'luaspanen' => $this->DataKecamatanModel->LuasPanenTotal(),
            'luaspadi' => $this->DataKecamatanModel->LuasPadi(),
            'luasjagung' => $this->DataKecamatanModel->LuasJagung(),
            'luaskedelai' => $this->DataKecamatanModel->LuasKedelai(),
        ];
        return view('layouts.beranda', $data);
    }
    // public function detail($id)
    // {
    //     $data = [
    //         'kecamatan' => $this->DataKecamatanModel->DataKecamatan(),
    //         'detail' => $this->DataKecamatanModel->DetailKecamatan($id),
    //         'detaillahan' => $this->DataKecamatanModel->DetailData($id),
    //         'LuasLahan' => $this->DataKecamatanModel->LuasLahan($id),
    //         'LuasPanen' => $this->DataKecamatanModel->LuasPanen($id),
    //         'Produksi' => $this->DataKecamatanModel->Produksi($id),
    //         'Produktivitas' => $this->DataKecamatanModel->Produktivitas($id),
    //         'Tanaman' => $this->DataKecamatanModel->tanamanbyid($id),
    //     ];
    //     return view('layouts.datakecamatan', $data);
    //     // echo json_encode($data);
    // }
    public function lahan_detail($id)
    {

        // $data = file_get_contents("https://spk.devliffe.com/API/output_api?id_kecamatan=27");
        $json_url = "https://spk.devliffe.com/API/output_api?id_kecamatan=${id}";
        $json = file_get_contents($json_url);
        $data = [
            'kecamatan' => $this->DataKecamatanModel->DataKecamatan(),
            'detail' => $this->DataKecamatanModel->DetailKecamatan($id),
            'detaillahan' => $this->DataKecamatanModel->DetailData($id),
            'LuasLahan' => $this->DataKecamatanModel->LuasLahan($id),
            'LuasPanen' => $this->DataKecamatanModel->LuasPanen($id),
            'Produksi' => $this->DataKecamatanModel->Produksi($id),
            'Produktivitas' => $this->DataKecamatanModel->Produktivitas($id),
            'Tanaman' => $this->DataKecamatanModel->tanamanbyid($id),
            'totalph' => $this->DataKecamatanModel->totalph($id),
            'totalch' => $this->DataKecamatanModel->totalch($id),
            'totalsuhu' => $this->DataKecamatanModel->totalsuhu($id),
            'totaldata' => $this->DataKecamatanModel->totaldata($id),
            'lahanku' => json_decode($json, true)
        ];
        return view('layouts.datalahan', $data);



        // // echo "<pre>";
        // print_r($data);
        // // echo "</pre>";
        // // echo array($key);
        // foreach ($data as $key) {
        //     echo json_encode($key['nama_lahan']);
        // }
    }
}
