<?php

namespace App\Http\Requests;

use App\Models\MembeCardManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMembeCardManagementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('membe_card_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:membe_card_managements,id',
        ];
    }
}
