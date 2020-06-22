<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\add_material;
class add_materialsController extends Controller
{
    //
    private function add($p_code,$m_code,$quantity){
        add_material::create([
            'P_code' => $p_code,
            'M_Qr_code' => $a_code,
            'Quantity' => $quantity,
        ]); 
    }
    private function delete($p_code,$m_code){
    DB::delete("DELETE FROM `add_materials` WHERE P_code = '".$p_code."' and M_Qr_code = '" .$m_code."'");
    }
    private function selectCustomCode($p_code,$m_code){
        $results = add_accessorie::where('P_code', '=', $p_code)
        ->where('M_Qr_code', '=', $m_code)->get()->first();
        return $results->product->Custom_code;
    }
    private function selectAccessorieCode($p_code,$m_code){
        $results = add_accessorie::where('P_code', '=', $p_code)
        ->where('M_Qr_code', '=', $m_code)->get()->first();
        return $results->material->Custom_code;
    }
}
