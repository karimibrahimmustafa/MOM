<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class rule extends Model
{
    //
    protected $fillable = [
        'id','name'
    ];
    public function actions(){
        return $this->belongsToMany('App\action', 'rule_action', 'rule', 'action');
    }
}
