<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    //
    protected $fillable=[
    	'code', 'expireDate', 'percent', 'count'
    ];

    //هر کد تخفیفی متعلق به چه رویدادی است
    public function event(){
    	return $this->belongsTo(Event::class);
    }
    
}
