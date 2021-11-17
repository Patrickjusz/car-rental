<?php

namespace App\Jobs;

use App\Models\Car;
use App\Services\BoredApi;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class GetBoredApiActivityJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $car;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($car)
    {
        $this->car = $car;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $boredApi = new BoredApi();
        $response = $boredApi->getActivity(1);
        if (is_array($response)) {
            $car = $this->car;

            if (!is_null($response['key'])) {
                $car->key = $response['key'];
            }

            if (!is_null($response['type'])) {
                $car->type = $response['type'];
            }

            $car->save();
        }
    }
}
