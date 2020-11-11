@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.voucherCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.voucher-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $voucherCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherCategory.fields.cateogry') }}
                        </th>
                        <td>
                            {{ $voucherCategory->cateogry }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherCategory.fields.in_enable') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $voucherCategory->in_enable ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.voucher-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection