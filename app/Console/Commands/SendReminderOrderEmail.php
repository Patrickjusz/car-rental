<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Console\Command;
use App\Jobs\SendReminderMailJob;

class SendReminderOrderEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a reminder email.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $orders = Order::whereDate('date_from', '=', Carbon::tomorrow())->where('is_notify', 0)->get();
        foreach ($orders as $order) {
            dispatch(new SendReminderMailJob($order));
        }
    }
}
