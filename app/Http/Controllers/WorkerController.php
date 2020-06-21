<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class WorkerController extends Controller
{
    //

    function remove(Request $request){
    
    DB::delete("DELETE FROM `users` WHERE id = ".$_POST['id']);
    return $_POST['id'];
    }
}
