<?php

namespace App\Http\Requests;

use App\Models\CarParkLocation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCarParkLocationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('car_park_location_edit');
    }

    public function rules()
    {
        return [
            'location'  => [
                'string',
                'required',
            ],
            'is_enable' => [
                'required',
            ],
        ];
    }
}
