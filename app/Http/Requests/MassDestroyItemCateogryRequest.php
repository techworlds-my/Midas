<?php

namespace App\Http\Requests;

use App\Models\ItemCateogry;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyItemCateogryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('item_cateogry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:item_cateogries,id',
        ];
    }
}
