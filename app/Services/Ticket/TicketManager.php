<?php
namespace App\Services\Ticket;
use App\Services\Ticket\EventTicket;
use App\User;
use App\Event;
use App\Ticket;
use Mpdf\Mpdf;
use App\Cash;
use Illuminate\Support\Facades\File;
use App\Events\NewPay;
/**
 * 
 */
class TicketManager implements EventTicket
{
	
	//اتیجاد بلیت برای رویداد
	public function createTicket(User $user, Cash $cash){
		$code = str_random(4);
		$event = Event::where('id',$cash->event_id)->first();
		$ticket = new Ticket();
		$ticket->cash_id = $cash->id;
		$ticket->code = $code;
		$ticket->save();
		File::makeDirectory('ticket/'.$event->id,0777,true,true);
		if($this->generateQR($event, $code)){
			$pdf = new Mpdf();
			$ticket = Ticket::where('code',$code)->first();
			$html = view('ticket')->with([
				'user' => $user,
				'event' => $event,
				'ticket' => $ticket
			]);
			$pdf->writeHTML($html);
			$name = 'ticket_'.str_random(10).'.pdf';
			$path = 'ticket/'.$event->id.'/'.$name;
			$pdf->Output($path,'F');
			$TMPticket = Ticket::where('code',$code)->first();
			$TMPticket->file = $path;
			$TMPticket->save();
		}
		return $this->sendTicket($user, $event, $cash);
	}
	//ایجاد بارکد برای بلیت
	public function generateQR($event, $code){
		
		$ticket = Ticket::where('code',$code)->first();
		$name = 'QR_'.str_random(5).'.png';
		$path = '../public/ticket/'.$event->id.'/'.$name;
		if(\QrCode::format('png')->backgroundColor(250,250,250)->size(140)->generate($code, $path)){
			$ticket->QR = 'ticket/'.$event->id.'/'.$name;
			$ticket->save();
			return true;
		}
		return false;
	}
	//ارسال بلیت به ایمیل
	public function sendTicket($user, $event, $ticket){
		return event(new NewPay($user, $event, $ticket));
	}
}