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
}
