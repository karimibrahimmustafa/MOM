<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class add_accessorie extends Model
{
    //
    protected $fillable = [
        'A_Qr_code','P_code','Quantity'
    ];
    public function accessorie(){
        return $this->belongsTo('App\accessorie','A_Qr_code','A_Qr_code');
    }
    public function product(){
        return $this->belongsTo('App\product','P_code','P_code');
    }
}
