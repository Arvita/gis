<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BerandaModel;

class BerandaController extends Controller
{
    public function __construct()
    {
        $this->BerandaModel = new BerandaModel();
    }

    public function index()
    {
        $data = [
            'kecamatan' => $this->BerandaModel->DataKecamatan(),
        ];
        return view('layouts.beranda', $data);
    }
}