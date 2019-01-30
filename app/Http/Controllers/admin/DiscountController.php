<?php

namespace App\Http\Controllers\admin;

use App\Discount;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {   
        if(Event::find($id)){
            Session::forget('event');
            Session::put('event',$id);
            $codes = Discount::Where('event_id', $id)->get();
            return view('dashboard.admin.discount',compact('codes'));
        }
        return back()->with('msg', 'رویداد مربوطه یافت نشد');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'code' => 'required|string|max:5|min:5',
            'percent' => 'required|numeric|max:99|min:1',
            'count' => 'required|numeric|min:1',
            'expireDate' => 'required'
        ]);
        $date = date_create();
        date_timestamp_set($date, $request->get('expireDate'));
        if($date < now())
            return back()->with('msg','تاریخ انقضا باید پیش رو باشد');

        $discount = new Discount();
        $discount->code = 'DN_'.$request->get('code');
        $discount->percent = $request->get('percent');
        $discount->count = $request->get('count');
        $discount->event_id = Session::get('event');
        $discount->expireDate = $date;

        if($discount->save()){
            Session::forget('event');
            return back();
        }
        return back()->with('msg','مشکلی پیش امده است');
    }

    /**
     * delete the specified resource in storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        if(Discount::destroy($id))
            return back();
        return back()->with('msg','عملیات ناموفق بود');
    }

}
