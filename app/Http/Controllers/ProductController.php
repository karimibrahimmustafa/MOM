<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use DB;
class ProductController extends Controller
{
    //
    function add(){
        $this->addProduct("code3","code2");
        return "done";
    }
    private function addProduct($p_code,$custom_code){
            product::create([
                'P_code' => $p_code,
                'Custom_code' => $custom_code,
            ]); 
    }
    private function deleteProduct($p_code){
        DB::delete("DELETE FROM `products` WHERE P_code = '".$p_code."'");
    }
}
