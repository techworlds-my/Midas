@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mallUnit.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mall-units.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mallUnit.fields.id') }}
                        </th>
                        <td>
                            {{ $mallUnit->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mallUnit.fields.unit_no') }}
                        </th>
                        <td>
                            {{ $mallUnit->unit_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mallUnit.fields.floor') }}
                        </th>
                        <td>
                            {{ $mallUnit->floor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mallUnit.fields.merchant') }}
                        </th>
                        <td>
                            {{ $mallUnit->merchant->company_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mallUnit.fields.size') }}
                        </th>
                        <td>
                            {{ $mallUnit->size }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mallUnit.fields.status') }}
                        </th>
                        <td>
                            {{ $mallUnit->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mallUnit.fields.rental') }}
                        </th>
                        <td>
                            {{ $mallUnit->rental }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mall-units.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection