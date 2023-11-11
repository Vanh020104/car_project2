<?php

namespace App\Listeners;

use App\Events\CreateNewOrder;
use App\Events\CreateNewRemindReturnCar;
use App\Mail\NewRemindReturnCar;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;

class DispatchNewRemindReturnCar
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreateNewRemindReturnCar $event): void
    {
        $order = $event->order;
        Mail::to($order->email)
//            ->cc("mail nhan vien")
//            ->bcc("mail quan ly")
            ->send(new NewRemindReturnCar($order));
    }
}
