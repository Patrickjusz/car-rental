<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;


class BoredApi
{
    private string $url = 'https://www.boredapi.com/api/activity?participants=1';

    /**
     * getActivity
     *
     * @param  int $participants
     * @return void
     */
    public function getActivity(int $participants)
    {
        $response = Http::get($this->url)->json();
        return $response;
    }
}
