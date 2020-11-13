<?php

namespace App\Http\Requests;

use App\Models\VoucherWallet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVoucherWalletRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('voucher_wallet_create');
    }

    public function rules()
    {
        return [
            'is_redeem' => [
                'required',
            ],
            'usage'     => [
                'string',
                'nullable',
            ],
            'username'  => [
                'string',
                'required',
            ],
            'voucher'   => [
                'string',
                'nullable',
            ],
        ];
    }
}
