<?php
namespace App\Services\Ticket;
use App\User;
use App\Ticket;
use App\Event;
use App\Cash;
/**
 * 
 */
interface EventTicket{
	 

	function createTicket(User $user, Cash $cash);

	function generateQR(Event $event, $code);

	function sendTicket(User $user, Event $event, Ticket $ticket);

}