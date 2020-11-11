<?php

namespace App\Http\Requests;

use App\Models\RewardCatogery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRewardCatogeryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reward_catogery_create');
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
