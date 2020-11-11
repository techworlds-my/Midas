<?php

namespace App\Http\Requests;

use App\Models\ShopRental;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShopRentalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shop_rental_edit');
    }

    public function rules()
    {
        return [
            'merchant_id'    => [
                'required',
                'integer',
            ],
            'date'           => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'amount'         => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'status'         => [
                'string',
                'required',
            ],
            'payment_method' => [
                'string',
                'nullable',
            ],
        ];
    }
}
