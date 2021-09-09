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
            ->join('lahan', 'kecamatan.id_kecamatan', '=', 'lahan.id_kecamatan')
            ->join('tanaman', 'lahan.id_tanaman', '=', 'tanaman.id_tanaman')
            ->select('lahan.*', 'tanaman.*', 'kecamatan.*')
            ->where('kecamatan.id_kecamatan', $id_kecamatan)->first();
    }
    public function pinMaps()
    {
        return DB::table('kecamatan')
            ->join('lahan', 'kecamatan.id_kecamatan', '=', 'lahan.id_kecamatan')
            ->join('tanaman', 'lahan.id_tanaman', '=', 'tanaman.id_tanaman')
            ->select('lahan.*', 'tanaman.*', 'kecamatan.*')
            ->get();
    }
    public function LuasLahan($id_kecamatan)
    {
        return DB::table('lahan')

            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'lahan.id_kecamatan')
            ->select('lahan.*', 'kecamatan.*')
            ->where('kecamatan.id_kecamatan', '=', $id_kecamatan)
            ->sum('lahan.luas_lahan');
    }
    public function LuasPanen($id_kecamatan)
    {
        return DB::table('lahan')

            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'lahan.id_kecamatan')
            ->select('lahan.*', 'kecamatan.*')
            ->where('kecamatan.id_kecamatan', '=', $id_kecamatan)
            ->sum('lahan.luas_panen');
    }
    public function Produksi($id_kecamatan)
    {
        return DB::table('lahan')

            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'lahan.id_kecamatan')
            ->select('lahan.*', 'kecamatan.*')
            ->where('kecamatan.id_kecamatan', '=', $id_kecamatan)
            ->sum('lahan.produksi');
    }
    public function Produktivitas($id_kecamatan)
    {
        return DB::table('lahan')

            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'lahan.id_kecamatan')
            ->select('lahan.*', 'kecamatan.*')
            ->where('kecamatan.id_kecamatan', '=', $id_kecamatan)
            ->sum('lahan.produktivitas');
    }
    public function LuasLahanTotal()
    {
        return DB::table('lahan')
            ->sum('lahan.luas_lahan');
    }
    public function LuasPadi()
    {
        return DB::table('lahan')
            ->where('id_tanaman' , 4)
            ->sum('lahan.luas_lahan');
    }
    public function LuasJagung()
    {
        return DB::table('lahan')
            ->where('id_tanaman' , 5)
            ->sum('lahan.luas_lahan');
    }
    public function LuasKedelai()
    {
        return DB::table('lahan')
            ->where('id_tanaman' , 6)
            ->sum('lahan.luas_lahan');
    }
}
