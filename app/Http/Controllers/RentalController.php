<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRentalRequest;
use App\Services\RentalService;

class RentalController extends Controller
{
    /**
     * Display a rental subpage.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $cars = Car::where('state', 'active')->paginate(10);
        return view('rental', ['cars' => $cars]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRentalRequest $request)
    {
        return RentalService::create($request->validated());
    }
}
