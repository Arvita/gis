<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BerandaModel extends Model
{
    public function DataKecamatan()
    {
        return DB::table('kecamatan')->get();
    }
}
