<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LahanModel extends Model
{
    public function DataLahan()
    {
        return DB::table('lahan')
            ->join('kelurahan', 'kelurahan.id_kelurahan', '=', 'lahan.id_kelurahan')
            ->join('tanaman', 'lahan.id_tanaman', '=', 'tanaman.id_tanaman')
            ->select('lahan.*', 'kelurahan.nama_kelurahan', 'tanaman.nama_tanaman')->get();
    }
    public function getAllKelurahan()
    {
        return DB::table('kelurahan')->get();
    }
    public function getAllTanaman()
    {
        return DB::table('tanaman')->get();
    }

    public function InsertData($data)
    {
        return DB::table('lahan')->insert($data);
    }

    public function DetailData($id_lahan)
    {
        return DB::table('lahan')
            ->join('kelurahan', 'kelurahan.id_kelurahan', '=', 'lahan.id_kelurahan')
            ->join('tanaman', 'lahan.id_tanaman', '=', 'tanaman.id_tanaman')
            ->select('lahan.*', 'kelurahan.nama_kelurahan', 'tanaman.nama_tanaman')
            ->where('id_lahan', $id_lahan)->first();
    }

    public function UpdateData($id_lahan, $data)
    {
        return DB::table('lahan')->where('id_lahan', $id_lahan)->update($data);
    }

    public function DeleteData($id_lahan)
    {
        return DB::table('lahan')->where('id_lahan', $id_lahan)->delete();
    }
}
