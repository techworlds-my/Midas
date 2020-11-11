<?php

namespace App\Http\Requests;

use App\Models\RewardManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRewardManagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reward_management_edit');
    }

    public function rules()
    {
        return [
            'merchant_id'     => [
                'required',
                'integer',
            ],
            'category_id'     => [
                'required',
                'integer',
            ],
            'expired'         => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'title'           => [
                'string',
                'required',
            ],
            'top_up_amount'   => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'purchase_amount' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'referral_amount' => [
                'string',
                'nullable',
            ],
            'bonus'           => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'point'           => [
                'string',
                'nullable',
            ],
        ];
    }
}
