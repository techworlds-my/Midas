<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'name'           => [
                'string',
                'required',
            ],
            'email'          => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'username'       => [
                'string',
                'required',
                'unique:users,username,' . request()->route('user')->id,
            ],
            'roles.*'        => [
                'integer',
            ],
            'roles'          => [
                'required',
                'array',
            ],
            'total_credit'   => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'current_credit' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_point'    => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'current_point'  => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
