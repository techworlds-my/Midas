<?php

namespace App\Http\Requests;

use App\Models\RewardManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRewardManagementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reward_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reward_managements,id',
        ];
    }
}
