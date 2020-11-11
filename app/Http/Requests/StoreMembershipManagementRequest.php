<?php

namespace App\Http\Requests;

use App\Models\MembershipManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMembershipManagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('membership_management_create');
    }

    public function rules()
    {
        return [
            'user_name_id' => [
                'required',
                'integer',
            ],
            'company'      => [
                'string',
                'required',
            ],
        ];
    }
}
