<?php

namespace App\Http\Requests;

use App\Models\CarParkLocation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCarParkLocationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('car_park_location_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:car_park_locations,id',
        ];
    }
}
