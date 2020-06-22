<?php

use Illuminate\Database\Seeder;
use App\action;
use App\rule;
class actions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $actions = [];
        $actions [] = action::create([
            'name' => "remove_user",
            'discription' => "إمكانية حذف موظف"
        ]);    
        $actions [] =action::create([
            'name' => "add_user",
            'discription' => "إمكانية إضافة موظف"
        ]);
        $actions [] = action::create([
            'name' => "show_user",
            'discription' =>"إمكانية رؤية الموظفين"
        ]); 
        $actions [] = action::create([
            'name' => "modify_user",
            'discription' =>"إمكانية تغيير صلاحيات الموظفين"
        ]); 
        $actions [] = action::create([
            'name' => "change_rule",
            'discription' =>"إمكانية تعديل وحذف الصلاحيات"
        ]); 
        $rule =  rule::create([
            'id'=>0,
            'name'=>'none',
        ]); 
        $rule =  rule::create([
            'name' => "أدمن رئيسي",
        ]); 
        foreach($actions as $action){
            $rule->actions()->attach($action->id);
        }  
    }
}
