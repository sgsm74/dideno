<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Event;
use App\Discount;

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

            Session::put('event_discount',$id);
            Session::put('event_cost', $event->cost);

    		return view('dashboard.user.payment',compact('event'));
    	}
    }
    //محاسبه ککد تخفیف
    public function calculate(Request $request){
            $this->validate($request,[
                'code'=>'required',
            ]);
            if($result=Discount::where('code',$request->get('code'))->first()){
                if(Session::get('event_discount') == $result->event_id){
                    if($result->count > 0){
                        if($result->expireDate>now()){
                            $event = Event::find(Session::get('event_discount'));
                            $discount = ((($result->percent) * ((int)$event->cost)) / 100);
                            $cost = ((int)$event->cost) - ((($result->percent) * ((int)$event->cost)) / 100);
                            Session::put('event_cost', $cost);
                            Session::put('discount',$result);
                            return response()->json(['msg' => 'کد تخفیف با موفقیت اعمال شد','cost'=>$cost,'discount' => $discount], 200);
                        }
                        else{
                            return response()->json(['msg'=>'مهلت استفاده از کد تخفیف تمام شده است'], 403);
                        }
                    }
                    else{
                        return response()->json(['msg'=>'کد تخفیف تمام شده است'], 403);
                    }
                }
                else{
                    return response()->json(['msg' => 'کد تخفیف برای این رویداد نیست'], 404);
                }
            }
            else{
                return response()->json(['msg' => 'کد تخفیف نامعتبر است'], 404);
            }
    }

}
