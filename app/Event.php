<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $dates=['date'];
    //هر رویداد می تواند چنیدن شرکت کننده داشته باشد
    public function users(){

        return $this->belongsToMany(User::class);
    }

    public function cashes(){

    	return $this->hasMany(Cash::class);
    }

    //هر رویداد چندین کد تخفیف دارد
    public function discounts(){

    	return $this->hasMany(Discount::class);
    }
}
