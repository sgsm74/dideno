<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTicketToEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user, $event, $cash, $ticke;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $event, $cash)
    {
        //
        $this->user = $user;
        $this->event = $event;
        $this->cash = $cash;
        $this->ticket = $cash->ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("شرکت در رویداد".$this->event->title)
            ->from("info@dideno2018.ir")
            ->to($this->user->email)
            ->markdown('vendor.mail.ticket.index', ['user' => $this->user,'cash' => $this->cash, 'event' => $this->event])
            ->attach(public_path($this->ticket->file));
    }
}
