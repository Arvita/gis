<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KelurahanModel extends Model
{
    public function AllData()
    {
        return DB::table('kelurahan')->join('kecamatan', 'kelurahan.id_kecamatan', '=', 'kecamatan.id_kecamatan')->get();
    }

    public function DataKecamatan()
    {
        return DB::table('kecamatan')->get();
    }
    public function DataQuery($id_kelurahan)
    {
        return DB::table('kelurahan')->join('kecamatan', 'kelurahan.id_kecamatan', '=', 'kecamatan.id_kecamatan')->join('kelurahan', 'kelurahan.id_kelurahan', '=', $id_kelurahan)->get();
    }
    public function InsertData($data)
    {
        return DB::table('kelurahan')->insert($data);
    }

    public function DetailData($id_kelurahan)
    {
        return DB::table('kelurahan')->join('kecamatan', 'kelurahan.id_kecamatan', '=', 'kecamatan.id_kecamatan')->where('kelurahan.id_kelurahan', '=', $id_kelurahan)->first();
    }

    public function UpdateData($id_kelurahan, $data)
    {
        return DB::table('kelurahan')->where('id_kelurahan', $id_kelurahan)->update($data);
    }

    public function DeleteData($id_kelurahan)
    {
        return DB::table('kelurahan')->where('id_kelurahan', $id_kelurahan)->delete();
    }
}
