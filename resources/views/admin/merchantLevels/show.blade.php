@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.merchantLevel.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.merchant-levels.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantLevel.fields.id') }}
                        </th>
                        <td>
                            {{ $merchantLevel->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantLevel.fields.level') }}
                        </th>
                        <td>
                            {{ $merchantLevel->level }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantLevel.fields.in_enable') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $merchantLevel->in_enable ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantLevel.fields.order_type') }}
                        </th>
                        <td>
                            @foreach($merchantLevel->order_types as $key => $order_type)
                                <span class="label label-info">{{ $order_type->type }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.merchant-levels.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection