<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelApi extends Model
{
    public static function find($param)
    {
            $id_kota = str_replace('0', '', substr($param, 0, 3));
            $data = DB::table('id_kota_'.$id_kota)
                     ->where('nrp', '=', $param);
            return $data->get();
        // try {
        // } catch (\Exception) {
        //     for ($id_kota=1; $id_kota < 39; $id_kota++) {
        //         $data = DB::table('id_kota_'.$id_kota)
        //                  ->where('nama', 'like', '%'.$param.'%');
        //         return $data->get();
        //     }
        // }
    }
}
