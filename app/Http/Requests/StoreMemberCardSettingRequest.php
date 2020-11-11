<?php

namespace App\Http\Requests;

use App\Models\MemberCardSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMemberCardSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('member_card_setting_create');
    }

    public function rules()
    {
        return [
            'company'    => [
                'string',
                'required',
            ],
            'card_image' => [
                'required',
            ],
            'format'     => [
                'string',
                'required',
            ],
        ];
    }
}
