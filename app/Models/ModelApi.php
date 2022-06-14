<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelApi extends Model
{
    private static function queryData($tb_name, $field, $param)
    {
        $data = DB::table($tb_name)
                 ->where($field, '=', $param)
                 ->join('Mata_Pelajaran', 'Mata_Pelajaran.id', '=', $tb_name.'.id_mapel')
                 ->select($tb_name.'.*', 'Mata_Pelajaran.nama as mapel');

        return $data;
    }

    public static function getKota()
    {
        $data = DB::table('kota');

        return $data->get();
    }

    public static function find($param)
    {
        $int = (int) $param;

        if ($int == 0) {
            $field = 'nama';
            for ($id_kota=1; $id_kota < 39; $id_kota++) {
                $tb_name = 'id_kota_'.$id_kota;
                $result = ModelApi::queryData($tb_name, $tb_name.'.'.$field, $param);
                if ($result->count() != 0) {
                    break;
                }
            }
        } else {
            $field = 'nrp';
            $id_kota = str_replace('0', '', substr($param, 0, 3));
            $tb_name = 'id_kota_'.$id_kota;
            $result = ModelApi::queryData($tb_name, $tb_name.'.'.$field, $param);
        }
        
        return $result->get();
    }

    public static function getAllByKota($tb_name)
    {
        $data = DB::table($tb_name)
                 ->join('mata_pelajaran', 'mata_pelajaran.id', '=', $tb_name.'.id_mapel')
                 ->select($tb_name.'.*', 'mata_pelajaran.nama as mapel')
                 ->orderBy('nrp');

        return $data->get();
    }
}
