@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.merchantManagement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.merchant-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.id') }}
                        </th>
                        <td>
                            {{ $merchantManagement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.company_name') }}
                        </th>
                        <td>
                            {{ $merchantManagement->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.ssm') }}
                        </th>
                        <td>
                            {{ $merchantManagement->ssm }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.address') }}
                        </th>
                        <td>
                            {{ $merchantManagement->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.postcode') }}
                        </th>
                        <td>
                            {{ $merchantManagement->postcode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.in_charge_person') }}
                        </th>
                        <td>
                            {{ $merchantManagement->in_charge_person }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.contact') }}
                        </th>
                        <td>
                            {{ $merchantManagement->contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.email') }}
                        </th>
                        <td>
                            {{ $merchantManagement->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.position') }}
                        </th>
                        <td>
                            {{ $merchantManagement->position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.category') }}
                        </th>
                        <td>
                            {{ $merchantManagement->category->cateogry ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.sub_cateogry') }}
                        </th>
                        <td>
                            {{ $merchantManagement->sub_cateogry->sub_category ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.website') }}
                        </th>
                        <td>
                            {{ $merchantManagement->website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.facebook') }}
                        </th>
                        <td>
                            {{ $merchantManagement->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.instagram') }}
                        </th>
                        <td>
                            {{ $merchantManagement->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.level') }}
                        </th>
                        <td>
                            {{ $merchantManagement->level->level ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.merchant') }}
                        </th>
                        <td>
                            {{ $merchantManagement->merchant }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.merchant_admin') }}
                        </th>
                        <td>
                            {{ $merchantManagement->merchant_admin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.merchant_manager') }}
                        </th>
                        <td>
                            {{ $merchantManagement->merchant_manager }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.merchant-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection