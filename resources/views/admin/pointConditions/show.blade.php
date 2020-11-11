@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pointCondition.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.point-conditions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pointCondition.fields.id') }}
                        </th>
                        <td>
                            {{ $pointCondition->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointCondition.fields.title') }}
                        </th>
                        <td>
                            {{ $pointCondition->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointCondition.fields.is_enable') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $pointCondition->is_enable ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointCondition.fields.point_add') }}
                        </th>
                        <td>
                            {{ $pointCondition->point_add }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.point-conditions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection