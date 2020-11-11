<?php

namespace App\Http\Requests;

use App\Models\AddonManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAddonManagementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('addon_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:addon_managements,id',
        ];
    }
}
