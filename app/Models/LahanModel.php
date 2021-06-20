<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LahanModel extends Model
{
    public function DataLahan()
    {
        return DB::table('lahan')->get();
    }

    public function InsertData($data)
    {
        return DB::table('lahan')->insert($data);
    }

    public function DetailData($id_lahan)
    {
        return DB::table('lahan')->where('id_lahan', $id_lahan)->first();
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
