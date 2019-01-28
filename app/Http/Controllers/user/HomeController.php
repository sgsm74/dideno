<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Cash;
use App\User;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = \Auth::user()->events;
        $cashes = Cash::where('user_id',Auth::id())->where('is_paid',1)->get();
        if($closeEvent=Event::orderBy('date','asc')->where('date','>',now())->first()){
            return view('dashboard.user.index',compact(['closeEvent','events','cashes']));      
        }
        return view('dashboard.user.index',compact(['closeEvent','events','cashes']));      
    }

   
    public function events()
    {
        //
        $events = Event::where('date','>',now())->orderBy('date','desc')->get();
        return view('dashboard.user.events', compact('events'));
    }

   
    public function profile()
    {
        //
        return view('dashboard.user.profile');
    }

   
    public function financial()
    {
        $cashes = \Auth::user()->cashes()->paginate(10);
        return view('dashboard.user.financial',compact('cashes'));
    }

    public function payment(){
        return view('dashboard.user.payment');
    }

    public function report(){
        return view('dashboard.user.report');
    }

}
