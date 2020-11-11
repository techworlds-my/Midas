<?php

namespace App\Http\Requests;

use App\Models\FacilityManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFacilityManagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('facility_management_create');
    }

    public function rules()
    {
        return [
            'category_id' => [
                'required',
                'integer',
            ],
            'name'        => [
                'string',
                'required',
            ],
            'available'   => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'desctiption' => [
                'required',
            ],
            'status'      => [
                'required',
            ],
        ];
    }
}
