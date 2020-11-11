@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.facilityManagement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.facility-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.facilityManagement.fields.id') }}
                        </th>
                        <td>
                            {{ $facilityManagement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facilityManagement.fields.category') }}
                        </th>
                        <td>
                            {{ $facilityManagement->category->category ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facilityManagement.fields.name') }}
                        </th>
                        <td>
                            {{ $facilityManagement->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facilityManagement.fields.available') }}
                        </th>
                        <td>
                            {{ $facilityManagement->available }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facilityManagement.fields.desctiption') }}
                        </th>
                        <td>
                            {!! $facilityManagement->desctiption !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facilityManagement.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\FacilityManagement::STATUS_SELECT[$facilityManagement->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.facility-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection