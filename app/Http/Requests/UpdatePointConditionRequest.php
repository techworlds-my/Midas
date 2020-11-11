<?php

namespace App\Http\Requests;

use App\Models\PointCondition;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePointConditionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('point_condition_edit');
    }

    public function rules()
    {
        return [
            'title'     => [
                'string',
                'required',
            ],
            'is_enable' => [
                'required',
            ],
            'point_add' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
