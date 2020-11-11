<?php

namespace App\Http\Requests;

use App\Models\MemberCardSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMemberCardSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('member_card_setting_edit');
    }

    public function rules()
    {
        return [
            'company' => [
                'string',
                'required',
            ],
            'format'  => [
                'string',
                'required',
            ],
        ];
    }
}
