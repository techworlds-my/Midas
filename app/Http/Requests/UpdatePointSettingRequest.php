<?php

namespace App\Http\Requests;

use App\Models\PointSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePointSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('point_setting_edit');
    }

    public function rules()
    {
        return [
            'point_ratio' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'is_enable'   => [
                'required',
            ],
        ];
    }
}
