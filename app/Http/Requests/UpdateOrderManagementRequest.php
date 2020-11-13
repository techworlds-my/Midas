<?php

namespace App\Http\Requests;

use App\Models\OrderManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrderManagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_management_edit');
    }

    public function rules()
    {
        return [
            'order'            => [
                'string',
                'nullable',
            ],
            'status_id'        => [
                'required',
                'integer',
            ],
            'voucher'          => [
                'string',
                'nullable',
            ],
            'address'          => [
                'string',
                'required',
            ],
            'price'            => [
                'required',
            ],
            'tax'              => [
                'string',
                'nullable',
            ],
            'paymentmethod_id' => [
                'required',
                'integer',
            ],
            'comment'          => [
                'string',
                'nullable',
            ],
            'transaction'      => [
                'string',
                'nullable',
            ],
            'merchant'         => [
                'string',
                'required',
            ],
            'username'         => [
                'string',
                'required',
            ],
        ];
    }
}
