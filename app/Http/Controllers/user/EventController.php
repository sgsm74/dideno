<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Event;
class EventController extends Controller
{
    //
    public function show($id){
    	if(!Event::find($id) || !Event::find($id)->capacity || Event::find($id)->date < now()){
            Session::flash('msg','عملیات ناموفق بود دوباره امتحان کنید');
    		return redirect()->route('user.events');
    	}
    	else{
    		$event = Event::find($id);
    		return view('dashboard.user.payment',compact('event'));
    	}
    }
}
