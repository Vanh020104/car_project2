<?php

namespace App\Listeners;

use App\Events\CreateConfirmCompleted;
use App\Mail\ConfirmCancel;
use App\Mail\ConfirmCompleted;
use Illuminate\Support\Facades\Mail;

class DispatchConfirmCancel
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
            ->send(new ConfirmCancel($order));
    }
}

