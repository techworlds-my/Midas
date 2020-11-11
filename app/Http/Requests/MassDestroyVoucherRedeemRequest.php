<?php

namespace App\Http\Requests;

use App\Models\VoucherRedeem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVoucherRedeemRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('voucher_redeem_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:voucher_redeems,id',
        ];
    }
}
