<?php

namespace App\Listeners;

use App\Events\NewPay;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendTicketToEmail;
class SendPaymentEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewPay  $event
     * @return void
     */
    public function handle(NewPay $pay)
    {
        //
        Mail::send(new SendTicketToEmail($pay->user, $pay->event, $pay->cash));
    }
}
