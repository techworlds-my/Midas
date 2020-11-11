<?php

namespace App\Http\Requests;

use App\Models\MerchantManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMerchantManagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('merchant_management_create');
    }

    public function rules()
    {
        return [
            'company_name'     => [
                'string',
                'required',
            ],
            'ssm'              => [
                'string',
                'nullable',
            ],
            'address'          => [
                'string',
                'required',
            ],
            'postcode'         => [
                'string',
                'nullable',
            ],
            'in_charge_person' => [
                'string',
                'required',
            ],
            'contact'          => [
                'string',
                'required',
            ],
            'email'            => [
                'string',
                'required',
            ],
            'position'         => [
                'string',
                'required',
            ],
            'category_id'      => [
                'required',
                'integer',
            ],
            'sub_cateogry_id'  => [
                'required',
                'integer',
            ],
            'created_by_id'    => [
                'required',
                'integer',
            ],
            'website'          => [
                'string',
                'nullable',
            ],
            'facebook'         => [
                'string',
                'nullable',
            ],
            'instagram'        => [
                'string',
                'nullable',
            ],
            'level_id'         => [
                'required',
                'integer',
            ],
            'merchant'         => [
                'string',
                'nullable',
            ],
            'merchant_admin'   => [
                'string',
                'nullable',
            ],
            'merchant_manager' => [
                'string',
                'nullable',
            ],
        ];
    }
}
