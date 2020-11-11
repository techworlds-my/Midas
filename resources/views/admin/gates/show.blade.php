@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.gate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.gate.fields.id') }}
                        </th>
                        <td>
                            {{ $gate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gate.fields.name') }}
                        </th>
                        <td>
                            {{ $gate->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gate.fields.last_active') }}
                        </th>
                        <td>
                            {{ $gate->last_active }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gate.fields.location') }}
                        </th>
                        <td>
                            {{ $gate->location->location ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gate.fields.in_enable') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $gate->in_enable ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection