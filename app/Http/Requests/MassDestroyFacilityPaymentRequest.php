<?php

namespace App\Http\Requests;

use App\Models\FacilityPayment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFacilityPaymentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('facility_payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:facility_payments,id',
        ];
    }
}
