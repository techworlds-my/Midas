<?php

namespace App\Http\Requests;

use App\Models\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gate_create');
    }

    public function rules()
    {
        return [
            'name'        => [
                'string',
                'required',
            ],
            'last_active' => [
                'string',
                'nullable',
            ],
            'location_id' => [
                'required',
                'integer',
            ],
            'in_enable'   => [
                'required',
            ],
        ];
    }
}
