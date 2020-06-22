<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\add_accessorie;
use DB;
class add_accessoriesController extends Controller
{
    //
    function adding(){
        return $this->selectAccessorieCode("code1","code1");
        // return "done";
    }
    private function add($p_code,$a_code,$quantity){
        add_accessorie::create([
            'P_code' => $p_code,
            'A_Qr_code' => $a_code,
            'Quantity' => $quantity,
        ]); 
    }
    private function delete($p_code,$a_code){
    DB::delete("DELETE FROM `add_accessories` WHERE P_code = '".$p_code."' and A_Qr_code = '" .$a_code."'");
    }
    private function selectCustomCode($p_code,$a_code){
        $results = add_accessorie::where('P_code', '=', $p_code)
        ->where('A_Qr_code', '=', $a_code)->get()->first();
        return $results->product->Custom_code;
    }
    private function selectAccessorieCode($p_code,$a_code){
        $results = add_accessorie::where('P_code', '=', $p_code)
        ->where('A_Qr_code', '=', $a_code)->get()->first();
        return $results->accessorie->Custom_code;
    }
}
