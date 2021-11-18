<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\NotifyReservationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendReminderMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->order->is_notify == 0) {
            $email = new NotifyReservationMail();
            Mail::to($this->order->email)->send($email);

            if (count(Mail::failures()) == 0) {
                $this->order->is_notify = 1;
                $this->order->save();
            }
        }
    }
}
