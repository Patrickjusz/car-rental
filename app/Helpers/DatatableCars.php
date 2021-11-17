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
                    $dataTag = ' data-id="' . $row->id . '" ';
                    $dataTag .= ' data-name="' . $row->name . '" ';
                    $dataTag .= ' data-description="' . $row->description . '" ';
                    $dataTag .= ' data-price="' . $row->price . '" ';
                    $dataTag .= ' data-amount="' . $row->amount . '" ';
                    $dataTag .= ' data-state="' . $row->state . '" ';

                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm btn-action" ' . $dataTag . ' data-action="edit">Edytuj</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm btn-action" data-id="' . $row->id . '" data-action="delete">Usuń</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
