<?php

namespace App\Http\Requests;

use App\Models\VehicleMangement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVehicleMangementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vehicle_mangement_create');
    }

    public function rules()
    {
        return [
            'username_id'    => [
                'required',
                'integer',
            ],
            'car_plate'      => [
                'string',
                'required',
            ],
            'model'          => [
                'string',
                'nullable',
            ],
            'color'          => [
                'string',
                'nullable',
            ],
            'is_season_park' => [
                'required',
            ],
            'driver_count'   => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'is_resident'    => [
                'required',
            ],
        ];
    }
}
