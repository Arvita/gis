<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKecamatanModel;

class DataKecamatanController extends Controller
{
    public function __construct()
    {
        $this->DataKecamatanModel = new DataKecamatanModel();
    }

    public function index($id)
    {
        $data = [
            'kecamatan' => $this->DataKecamatanModel->DataKecamatan(),
            'tanaman' => $this->DataKecamatanModel->DataTanaman(),
        ];
        return view('layouts.datakecamatan', $data);
    }
}
