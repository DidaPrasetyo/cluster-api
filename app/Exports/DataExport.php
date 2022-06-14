<?php

namespace App\Exports;

use App\Models\ModelApi;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataExport implements FromCollection
{
    protected $tb_name;
    function __construct($tb_name) {
        $this->tb_name = $tb_name;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return ModelApi::table($this->tb_name)
        //                     ->join('mata_pelajaran', 'mata_pelajaran.id', '=', $this->tb_name.'.id_mapel')
        //                     ->select($this->tb_name.'.*', 'mata_pelajaran.nama as mapel')->get();
        return ModelApi::getAllByKota($this->tb_name);
    }
}
