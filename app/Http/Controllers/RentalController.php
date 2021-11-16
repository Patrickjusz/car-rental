<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a rental subpage.
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
}
