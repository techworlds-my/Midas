<?php

namespace App\Http\Requests;

use App\Models\MembershipManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMembershipManagementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('membership_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:membership_managements,id',
        ];
    }
}
