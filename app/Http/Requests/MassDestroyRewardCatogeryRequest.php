<?php

namespace App\Http\Requests;

use App\Models\RewardCatogery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRewardCatogeryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reward_catogery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reward_catogeries,id',
        ];
    }
}
