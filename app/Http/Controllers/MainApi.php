<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelApi;

class MainApi extends Controller
{

    public function index() {
        return response()->json([
            "message" => "Welcome to Main Cluster API Controller",
            "by" => "Dida Prasetyo Rahmat si ganteng :)"
        ], 200);
    }

    public function find($param) {
        // $nilai = ModelApi::find($id_kota, $nrp)->toJson(JSON_PRETTY_PRINT);
        // return response($nilai, 200);
        $data = ModelApi::find($param);
        return response()->json(
            $data
        , 200);
    }

    // public function getAllProduct() {
    //     $product = Product::get()->toJson(JSON_PRETTY_PRINT);
    //     return response($product, 200);
    // }
}
