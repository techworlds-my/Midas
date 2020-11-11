<?php

namespace App\Http\Requests;

use App\Models\VoucherRedeem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVoucherRedeemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('voucher_redeem_edit');
    }

    public function rules()
    {
        return [
            'vouchercode_id' => [
                'required',
                'integer',
            ],
            'username'       => [
                'string',
                'nullable',
            ],
            'merchant'       => [
                'string',
                'nullable',
            ],
            'date'           => [
                'string',
                'nullable',
            ],
            'amount'         => [
                'string',
                'nullable',
            ],
            'type'           => [
                'string',
                'nullable',
            ],
        ];
    }
}
