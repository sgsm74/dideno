<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use App\Cash;
class HomeController extends Controller
{
    //نمایش صفحه اصلی پنل ادمین
    public function index(){
    	$usersCount = User::all()->count();
    	$eventsCount = Event::all()->count();
    	$lastUsers = User::orderBy('created_at', 'desc')->take(8)->get();
    	$cashes = collect(Cash::where('is_paid',1)->get());
    	$cashesSum = $cashes->sum('Amount');
    	return view('dashboard.admin.index',compact([
    		'usersCount',
    		'eventsCount',
    		'cashesSum',
    		'lastUsers'
    	]));
    }

    //نمایش صفحه پروفایل
    public function profile(){
    	return view('dashboard.admin.profile',compact('user',Auth::user()));
    }

}
