<?php

namespace App\Http\Requests;

use App\Models\RewardList;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRewardListRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reward_list_edit');
    }

    public function rules()
    {
        return [
            'reward_id'   => [
                'required',
                'integer',
            ],
            'reward_type' => [
                'string',
                'required',
            ],
            'amount'      => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
