<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $setting = DB::table('setting')->first();
        return view('dashboard.admin.setting',compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $this->validate($request,[
            'title' =>'required|string|max:250',
            'phone' =>'required|numeric',
            'email' =>'required|email',
            'address' => 'required|string|max:250',
            'about'=>'required',
            'instagram' => 'required|string|max:250',
            'facebook' => 'required|string|max:250',
            'telegram' =>'required|string|max:250',
            'twitter' => 'required|string|max:250',
        ]);
        $update = DB::table('setting')->where('id',1)->update([
            'title' => $request->get('title'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'about' => $request->get('about'),
            'instagram' => $request->get('instagram'),
            'facebook' => $request->get('facebook'),
            'twitter' => $request->get('twitter'),
            'telegram' => $request->get('telegram'),
        ]);
        if($update)
            return back();
        return back()->with('error', 'عملیات موفقیت آمیز نبود');
    }

}
