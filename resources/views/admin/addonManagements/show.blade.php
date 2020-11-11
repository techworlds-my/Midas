@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.addonManagement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.addon-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.addonManagement.fields.id') }}
                        </th>
                        <td>
                            {{ $addonManagement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addonManagement.fields.category') }}
                        </th>
                        <td>
                            {{ $addonManagement->category->category ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addonManagement.fields.title') }}
                        </th>
                        <td>
                            {{ $addonManagement->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addonManagement.fields.price') }}
                        </th>
                        <td>
                            {{ $addonManagement->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addonManagement.fields.is_enable') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $addonManagement->is_enable ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addonManagement.fields.item') }}
                        </th>
                        <td>
                            {{ $addonManagement->item->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.addon-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection