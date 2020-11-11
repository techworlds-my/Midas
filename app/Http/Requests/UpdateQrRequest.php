<?php

namespace App\Http\Requests;

use App\Models\Qr;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQrRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('qr_edit');
    }

    public function rules()
    {
        return [
            'username_id' => [
                'required',
                'integer',
            ],
            'code'        => [
                'string',
                'required',
            ],
            'status'      => [
                'string',
                'required',
            ],
        ];
    }
}
