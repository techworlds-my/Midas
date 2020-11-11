<?php

namespace App\Http\Requests;

use App\Models\FacilityPayment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFacilityPaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('facility_payment_edit');
    }

    public function rules()
    {
        return [
            'facility_id'       => [
                'required',
                'integer',
            ],
            'username_id'       => [
                'required',
                'integer',
            ],
            'amount'            => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'payment_method_id' => [
                'required',
                'integer',
            ],
            'status'            => [
                'required',
            ],
        ];
    }
}
