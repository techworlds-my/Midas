<?php

namespace App\Http\Requests;

use App\Models\MallUnit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMallUnitRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mall_unit_create');
    }

    public function rules()
    {
        return [
            'unit_no' => [
                'string',
                'required',
            ],
            'floor'   => [
                'string',
                'required',
            ],
            'size'    => [
                'string',
                'required',
            ],
            'status'  => [
                'string',
                'required',
            ],
            'rental'  => [
                'string',
                'required',
            ],
        ];
    }
}
