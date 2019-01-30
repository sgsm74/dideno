<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\User;
use App\Cash;
use App\Event;
use App\Services\Bank\Bank;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\Ticket\EventTicket;
use Illuminate\Support\Facades\Session;
class PaymentGateway extends Controller
{
    function gateway(Request $request,Bank $bank){

        $this->validate($request, [
            'id' => 'required|integer|min:0',// به تومان
        ]);
        
        if($event = Event::find($request->id) && Session::get('event_discount') == $request->id){
            $tempCash=new Cash();
            $tempCash->Amount=Session::get('event_cost');
            $tempCash->user_id=Auth::id();
            $tempCash->event_id=$request->id;
            $tempCash->is_paid = 0;// به معنی  این است که موقته
            $tempCash->saveOrFail();

            return $bank->gateway(Auth::user(),$tempCash);
        }
        return back();
    }

    function paymentVerify(Request $request,User $user,Cash $cash,Bank $bank,EventTicket $ticket)
    {

        $result = $bank->paymentVerification($request, $user, $cash);
        if (!$result["success"]) {
            return view('dashboard.user.report', [
                'error' => $result["msg"],
            ]);
        }
        $resultVerify=$bank->paymentVerify($request, $cash);
        if( $resultVerify["success"] ){
            $cash->is_paid = 1;
            $cash->RefId =$resultVerify["referenceId"];
            $cash->save();
            $cash->event()->decrement('capacity');
            
            DB::insert('insert into event_user (event_id, user_id, created_at, updated_at) values (?, ?, ?, ?)', [$cash->event_id, $cash->user_id, now(), now()]);
            
            $ticket->createTicket(Auth::user(), $cash);
            
            if(Session::has('discount')){
                $discount = Session::has('discount');
                $discount->decrement('count');
                $discount->save();
            }
            

            Session::forget(['discount','event_cost','event_discount']);

            return view('dashboard.user.report', [
                'RefId' => $cash->RefId,
                'Amount' => $cash->Amount,
                'date' => $cash->created_at,
                'ticket' => $cash->ticket->file
            ]);
        }else{
            return view('dashboard.user.report', [
                'error' => $bank->resultCode($resultVerify["resultCode"]),
            ]);
        }
    }
}
