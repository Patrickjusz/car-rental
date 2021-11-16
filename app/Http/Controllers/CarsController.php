<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Requests\StoreCarRequest;
use App\Services\CarService;
use Illuminate\Http\JsonResponse;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('cars');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(StoreCarRequest $request): JsonResponse
    {
        return CarService::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(StoreCarRequest $request, $id): JsonResponse
    {
        // X-Requested-With:XMLHttpRequest
        return CarService::update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return CarService::destroy($id);
    }
}
