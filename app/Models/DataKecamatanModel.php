<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataKecamatanModel extends Model
{
    public function DataKecamatan()
    {
        return DB::table('kecamatan')->get();
    }

    public function DataTanaman()
    {
        return DB::table('tanaman')->get();
    }
    public function DetailKecamatan($id_kecamatan)
    {
        return DB::table('kecamatan')->where('id_kecamatan', $id_kecamatan)->first();
    }
    public function DetailData($id_kecamatan)
    {
        return DB::table('kecamatan')
            ->join('kelurahan', 'kelurahan.id_kecamatan', '=', 'kecamatan.id_kecamatan')
            ->join('lahan', 'kelurahan.id_kelurahan', '=', 'lahan.id_kelurahan')
            ->join('tanaman', 'lahan.id_tanaman', '=', 'tanaman.id_tanaman')
            ->select('lahan.*', 'kelurahan.nama_kelurahan', 'tanaman.nama_tanaman', 'kecamatan.nama_kecamatan')
            ->where('kecamatan.id_kecamatan', $id_kecamatan)->get();
    }
    public function LuasLahan($id_kecamatan)
    {
        return DB::table('lahan')
            ->join('kelurahan', 'kelurahan.id_kelurahan', '=', 'lahan.id_kelurahan')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'kelurahan.id_kelurahan')
            ->select('lahan.*', 'kelurahan.*', 'kecamatan.*')
            ->where('kecamatan.id_kecamatan', '=', $id_kecamatan)
            ->sum('lahan.luas_lahan');
    }
    public function LuasPanen($id_kecamatan)
    {
        return DB::table('lahan')
            ->join('kelurahan', 'kelurahan.id_kelurahan', '=', 'lahan.id_kelurahan')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'kelurahan.id_kelurahan')
            ->select('lahan.*', 'kelurahan.nama_kelurahan', 'kecamatan.*')
            ->where('kecamatan.id_kecamatan', '=', $id_kecamatan)
            ->sum('lahan.luas_panen');
    }
    public function Produksi($id_kecamatan)
    {
        return DB::table('lahan')
            ->join('kelurahan', 'kelurahan.id_kelurahan', '=', 'lahan.id_kelurahan')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'kelurahan.id_kelurahan')
            ->select('lahan.*', 'kelurahan.nama_kelurahan', 'kecamatan.*')
            ->where('kecamatan.id_kecamatan', '=', $id_kecamatan)
            ->sum('lahan.produksi');
    }
    public function Produktivitas($id_kecamatan)
    {
        return DB::table('lahan')
            ->join('kelurahan', 'kelurahan.id_kelurahan', '=', 'lahan.id_kelurahan')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'kelurahan.id_kelurahan')
            ->select('lahan.*', 'kelurahan.nama_kelurahan', 'kecamatan.*')
            ->where('kecamatan.id_kecamatan', '=', $id_kecamatan)
            ->sum('lahan.produktivitas');
    }
}
