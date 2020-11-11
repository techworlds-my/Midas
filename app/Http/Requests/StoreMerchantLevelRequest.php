<?php

namespace App\Http\Requests;

use App\Models\MerchantLevel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMerchantLevelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('merchant_level_create');
    }

    public function rules()
    {
        return [
            'level'         => [
                'string',
                'required',
            ],
            'in_enable'     => [
                'required',
            ],
            'order_types.*' => [
                'integer',
            ],
            'order_types'   => [
                'required',
                'array',
            ],
        ];
    }
}
