<?php

namespace App\Http\Requests;

use App\Models\RewardCatogery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRewardCatogeryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reward_catogery_edit');
    }

    public function rules()
    {
        return [
            'category'  => [
                'string',
                'required',
            ],
            'is_enable' => [
                'required',
            ],
        ];
    }
}
