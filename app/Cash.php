<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    //
    const GATEWAY_ZARINPAL="zarinpal";
    
    protected $fillable = [
        'amount','is_paid','reference_number'
    ];

    //هر تراکنش متعلق به چه کاربری است
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //هر تراکنش متعلق به چه رویدادی است
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    //هر تراکنش یک بیت داردی
    public function ticket(){
        return $this->hasOne(Ticket::class);
    }

    public function scopePaid($query)
    {
        return $query->where('is_paid', '=', 1);
    }


    public function scopeUnpaid($query)
    {
        return $query->where('is_paid', '=', 0);
    }
}
