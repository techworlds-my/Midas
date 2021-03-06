<?php

namespace App\Http\Requests;

use App\Models\EventPayment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEventPaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('event_payment_create');
    }

    public function rules()
    {
        return [
            'username_id'    => [
                'required',
                'integer',
            ],
            'event_id'       => [
                'required',
                'integer',
            ],
            'payment'        => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'payment_method' => [
                'string',
                'nullable',
            ],
        ];
    }
}
