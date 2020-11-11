<?php

namespace App\Http\Requests;

use App\Models\ItemCateogry;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreItemCateogryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('item_cateogry_create');
    }

    public function rules()
    {
        return [
            'category'  => [
                'string',
                'required',
            ],
            'in_enable' => [
                'required',
            ],
        ];
    }
}
