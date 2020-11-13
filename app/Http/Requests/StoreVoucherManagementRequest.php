<?php

namespace App\Http\Requests;

use App\Models\VoucherManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVoucherManagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('voucher_management_create');
    }

    public function rules()
    {
        return [
            'vouchercode'    => [
                'string',
                'required',
            ],
            'discount_type'  => [
                'required',
            ],
            'value'          => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'min_spend'      => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'max_spend'      => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'usage_limit'    => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'limit_item'     => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'limit_per_user' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'expired'        => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'description'    => [
                'string',
                'required',
            ],
            'redeem_point'   => [
                'string',
                'nullable',
            ],
            'merchant'       => [
                'string',
                'nullable',
            ],
            'item'           => [
                'string',
                'required',
            ],
        ];
    }
}
