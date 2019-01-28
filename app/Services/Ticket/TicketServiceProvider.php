<?php

namespace App\Services\Ticket;

use Illuminate\Support\ServiceProvider;
use App\Services\Ticket\TicketManager;
class TicketServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->bind(EventTicket::class, TicketManager::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
