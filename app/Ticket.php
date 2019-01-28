<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    public function cash(){

    	return $this->belongsTo(Cash::class);
    }
}
