<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Order;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\RentalService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreRentalRequest;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function get(int $id): JsonResponse
    {
        return RentalService::get($id);
    }
}
