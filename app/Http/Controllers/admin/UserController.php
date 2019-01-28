<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class UserController extends Controller
{
    public function index(){
    	$users = User::where('role', User::ROLE_USER)->paginate(10);
    	return view('dashboard.admin.users',compact('users'));
    }

    public function admins(){
    	$users = User::where('role', User::ROLE_ADMIN)->paginate(10);
    	return view('dashboard.admin.admins',compact('users'));
    }

    public function show($id){

    	if($user = User::findOrFail($id))
    		return view('dashboard.admin.showUser',compact('user'));
    	return back()->with('error','عملیات ناموفق بود');

    }

    public function upgrade($id){
    	
    	if(User::where('id', $id)->update(['role' => User::ROLE_ADMIN]))
    		return back();
    	return back()->with('error','عملیات ناموفق بود');
    }

    public function downgrade($id){

    	if(User::where('id', $id)->update(['role' => User::ROLE_USER]))
    		return back();
    	return back()->with('error','عملیات ناموفق بود');
    }

    public function delete($id){

    	if(User::destroy('id', $id))
    		return back();
    	return back()->with('error','عملیات ناموفق بود');
    }
}
