@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.itemCateogry.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.item-cateogries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.itemCateogry.fields.id') }}
                        </th>
                        <td>
                            {{ $itemCateogry->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemCateogry.fields.category') }}
                        </th>
                        <td>
                            {{ $itemCateogry->category }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemCateogry.fields.in_enable') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $itemCateogry->in_enable ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.item-cateogries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection