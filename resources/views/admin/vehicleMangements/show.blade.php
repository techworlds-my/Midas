@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vehicleMangement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vehicle-mangements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleMangement.fields.id') }}
                        </th>
                        <td>
                            {{ $vehicleMangement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleMangement.fields.username') }}
                        </th>
                        <td>
                            {{ $vehicleMangement->username->username ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleMangement.fields.car_plate') }}
                        </th>
                        <td>
                            {{ $vehicleMangement->car_plate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleMangement.fields.is_verify') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $vehicleMangement->is_verify ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleMangement.fields.brand') }}
                        </th>
                        <td>
                            {{ $vehicleMangement->brand->brand ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleMangement.fields.model') }}
                        </th>
                        <td>
                            {{ $vehicleMangement->model }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleMangement.fields.color') }}
                        </th>
                        <td>
                            {{ $vehicleMangement->color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleMangement.fields.is_season_park') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $vehicleMangement->is_season_park ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleMangement.fields.driver_count') }}
                        </th>
                        <td>
                            {{ $vehicleMangement->driver_count }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleMangement.fields.is_resident') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $vehicleMangement->is_resident ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vehicle-mangements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection