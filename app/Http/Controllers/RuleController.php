<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rule;
use App\action;
use App\User;
use DB;
class RuleController extends Controller
{
    //
    public function add(){
        $rules = rule::all();
        $actions =action::all();
        $arr = ["rules"=>$rules , "actions"=>$actions];
        return view("rule",$arr);
    }
    public function addrule(){
        $rule =  rule::create([
            'name' => $_POST['name'],
        ]); 
        $actions =action::all();
        $arr=[];
        foreach($actions as $action){
            if(isset($_POST['action'.$action->id])){
            $arr[]=$action->id;
            $rule->actions()->attach($action->id);
            }
        }
        return redirect()->route('home');
    }
    public function change(){
        $user =  User::find($_POST['user']);
        $user->type = $_POST['rule'];
        $user->save();
    }
    public function index(){
        $rules = rule::all()->where('id','!=',1);
        $arr = ["rules"=>$rules];
        return view("rules",$arr);
    }
    public function remove(){
        $rule =  rule::find($_POST['id']);
        DB::delete('DELETE FROM `rule_action` WHERE `rule` ='.$_POST['id']);
        DB::update('update users set type = 1 where type ='.$_POST['id']);
        $rule->delete();
        return $rule;
    }
}
