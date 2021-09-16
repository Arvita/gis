<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKecamatanModel;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->DataKecamatanModel = new DataKecamatanModel();

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'tanaman' => $this->DataKecamatanModel->DataTanaman(),
            'luaspanen' => $this->DataKecamatanModel->LuasPanenTotal(),
            'luaspadi' => $this->DataKecamatanModel->LuasPadi(),
            'luasjagung' => $this->DataKecamatanModel->LuasJagung(),
            'luaskedelai' => $this->DataKecamatanModel->LuasKedelai(),

            'totaldatatanaman' => $this->DataKecamatanModel->totaldatatanaman(),
            'luaspaditanaman' => $this->DataKecamatanModel->luaspaditanaman(),
            'luasjagungtanaman' => $this->DataKecamatanModel->luasjagungtanaman(),
            'luaskedelaitanaman' => $this->DataKecamatanModel->luaskedelaitanaman(),
        ];
        return view('dashboard', $data);
    }
}
