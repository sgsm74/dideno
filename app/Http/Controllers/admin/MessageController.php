<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
class MessageController extends Controller
{
    //
    public function receiveMessages(){
    	$messages = Contact::latest()->paginate(10);
    	return view('dashboard.admin.receiveMessages',compact('messages'));
    }
}
