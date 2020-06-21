<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $admins = DB::select('select * from users where type = "أدمن"');
        $workers = DB::select('select * from users where type = "موظف"');
        $service = DB::select('select * from users where type = "خدمة عملاء"');
        $arr = ["admins"=>$admins, "workers"=>$workers, "service"=>$service];
        return view('home',$arr);
    }
}
