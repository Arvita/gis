<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class TanamanModel extends Model
{
    public function getAllData()
    {
        return DB::table('tanaman')->get();
    }
    public function insertData($data)
    {
        DB::table('tanaman')->insert($data);
    }
    public function deleteData($id)
    {
        DB::table('tanaman')->where('id_tanaman', $id)->delete();
    }
    public function detail($id)
    {
        return DB::table('tanaman')->where('id_tanaman', $id)->first();
    }
    public function updateData($data, $id)
    {
        DB::table('tanaman')->where('id_tanaman', $id)->update($data);
    }
    public function AllData()
    {
        return DB::table('kelurahan')->get();
    }
}
