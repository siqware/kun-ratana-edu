<?php

namespace App\Http\Controllers;

use App\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function provinces(Request $request){
        $provinces = Province::all();
        $province_data = [];
        foreach ($provinces as $province){
            $province_data[] = [
                'id'=>$province->id,
                'text'=>$province->name
            ];
        }
        $province_format = [
            'results'=>$province_data,
        ];
        return $province_format;
    }
}
