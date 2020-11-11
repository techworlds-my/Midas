<?php

namespace App\Http\Requests;

use App\Models\UnitManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUnitManagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('unit_management_create');
    }

    public function rules()
    {
        return [
            'unit_id'  => [
                'required',
                'integer',
            ],
            'owner_id' => [
                'required',
                'integer',
            ],
            'status'   => [
                'required',
            ],
        ];
    }
}
