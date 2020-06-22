<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\material;
use DB;
class materialController extends Controller
{
    //test the operations
    function add(){
        $this->addMaterial("code3","code2");
        return "done";
    }
    private function addMaterial($material_code,$custom_code){
            material::create([
                'M_Qr_code' => $material_code,
                'Custom_code' => $custom_code,
            ]); 
    }
    private function deleteMaterial($material_code){
        DB::delete("DELETE FROM `materials` WHERE M_Qr_code = '".$material_code."'");
    }
}
