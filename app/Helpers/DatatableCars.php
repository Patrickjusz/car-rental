<?php

namespace App\Helpers;

use App\Models\Car;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;

final class DatatableCars
{
    /**
     * get
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public static function getJSON(Request $request): JsonResponse
    {
        if ($request->ajax()) {
            $cars = Car::latest()->get();

            return DataTables::of($cars)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edytuj</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Usuń</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
