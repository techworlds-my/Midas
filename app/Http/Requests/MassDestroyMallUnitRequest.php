<?php

namespace App\Http\Requests;

use App\Models\MallUnit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMallUnitRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mall_unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mall_units,id',
        ];
    }
}
