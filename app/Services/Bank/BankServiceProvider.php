<?php

namespace App\Services\Bank;

use Illuminate\Support\ServiceProvider;
use App\Services\Bank\Strategies\Zarinpal;
class BankServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(Bank::class, Zarinpal::class);
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
