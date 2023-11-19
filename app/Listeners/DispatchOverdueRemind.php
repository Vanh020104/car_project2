<?php

namespace App\Listeners;

use App\Events\CreateNewRemindReturnCar;
use App\Events\CreateOverdueRemind;
use App\Mail\NewRemindReturnCar;
use App\Mail\OverdueRemind;
use Illuminate\Support\Facades\Mail;

class DispatchOverdueRemind
{

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreateOverdueRemind $event): void
    {
        $order = $event->order;
        Mail::to($order->email)
//            ->cc("mail nhan vien")
//            ->bcc("mail quan ly")
            ->send(new OverdueRemind($order));
    }
}
