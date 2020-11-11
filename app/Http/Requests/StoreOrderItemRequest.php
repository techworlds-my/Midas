<?php

namespace App\Http\Requests;

use App\Models\OrderItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_item_create');
    }

    public function rules()
    {
        return [
            'order'        => [
                'string',
                'required',
            ],
            'item'         => [
                'string',
                'required',
            ],
            'quantity'     => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price'        => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'add_on'       => [
                'string',
                'nullable',
            ],
            'add_on_price' => [
                'string',
                'nullable',
            ],
            'sub_total'    => [
                'string',
                'required',
            ],
        ];
    }
}
