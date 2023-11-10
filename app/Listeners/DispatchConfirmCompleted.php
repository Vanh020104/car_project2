<?php

namespace App\Listeners;

use App\Events\CreateConfirmCompleted;
use App\Events\CreateConfirmOrder;
use App\Mail\ConfirmCompleted;
use App\Mail\ConfirmOrder;
use Illuminate\Support\Facades\Mail;

class DispatchConfirmCompleted
{
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreateConfirmCompleted $event): void
    {
        $order = $event->order;
        Mail::to($order->email)
//            ->cc("mail nhan vien")
//            ->bcc("mail quan ly")
            ->send(new ConfirmCompleted($order));
    }
}
