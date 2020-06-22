<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\accessorie;
use DB;
class AccessoriesController extends Controller
{
    //
    function add(){
        $this->addAccessorie("code3","code2");
        return "done";
    }
    private function addAccessorie($material_code,$custom_code){
            accessorie::create([
                'A_Qr_code' => $material_code,
                'Custom_code' => $custom_code,
            ]); 
    }
    private function deleteAccessorie($material_code){
        DB::delete("DELETE FROM `accessories` WHERE A_Qr_code = '".$material_code."'");
    }
}
