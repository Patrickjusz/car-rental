<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;


class BoredApi
{
    private $url = 'https://www.boredapi.com/api/activity?participants=1';

    public function getActivity(int $participants)
    {
        $response = Http::get($this->url)->json();
        
        return $response;
    }
}
