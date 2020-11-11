<?php

namespace App\Http\Requests;

use App\Models\CarparkLog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCarparkLogRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('carpark_log_edit');
    }

    public function rules()
    {
        return [
            'carplate_id' => [
                'required',
                'integer',
            ],
            'time_in'     => [
                'string',
                'nullable',
            ],
            'time_out'    => [
                'string',
                'nullable',
            ],
            'price'       => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
