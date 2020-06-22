<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\rule;
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
    {   $workers =User::all();
        $rules =rule::all();
        $actions = Auth::user()->rule->actions;
        $prevs = [];
        foreach($actions as $action){
            $prevs[] = $action->name;
        }
        $arr = ["workers"=>$workers,"actions"=>$prevs,"rules"=>$rules];
        session()->put('Actions', $prevs);
        return view('home',$arr);
    }
}
