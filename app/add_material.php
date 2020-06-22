<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class add_material extends Model
{
    //
    protected $fillable = [
        'M_Qr_code','P_code','quantity'
    ];
    public function material(){
        return $this->belongsTo('App\material','M_Qr_code','M_Qr_code');
    }
    public function product(){
        return $this->belongsTo('App\product','P_code','P_code');
    }
}
