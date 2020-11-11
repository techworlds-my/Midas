<?php

namespace App\Http\Requests;

use App\Models\PointLog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePointLogRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('point_log_create');
    }

    public function rules()
    {
        return [
            'username_id' => [
                'required',
                'integer',
            ],
            'title_id'    => [
                'required',
                'integer',
            ],
            'point_gain'  => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
