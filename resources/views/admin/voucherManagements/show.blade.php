@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.voucherManagement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.voucher-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherManagement.fields.id') }}
                        </th>
                        <td>
                            {{ $voucherManagement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherManagement.fields.merchant') }}
                        </th>
                        <td>
                            {{ $voucherManagement->merchant->merchant ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherManagement.fields.vouchercode') }}
                        </th>
                        <td>
                            {{ $voucherManagement->vouchercode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherManagement.fields.discount_type') }}
                        </th>
                        <td>
                            {{ App\Models\VoucherManagement::DISCOUNT_TYPE_SELECT[$voucherManagement->discount_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherManagement.fields.value') }}
                        </th>
                        <td>
                            {{ $voucherManagement->value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherManagement.fields.min_spend') }}
                        </th>
                        <td>
                            {{ $voucherManagement->min_spend }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherManagement.fields.max_spend') }}
                        </th>
                        <td>
                            {{ $voucherManagement->max_spend }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherManagement.fields.excluded_sales_item') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $voucherManagement->excluded_sales_item ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherManagement.fields.item_category') }}
                        </th>
                        <td>
                            {{ $voucherManagement->item_category->category ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherManagement.fields.item') }}
                        </th>
                        <td>
                            @foreach($voucherManagement->items as $key => $item)
                                <span class="label label-info">{{ $item->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherManagement.fields.usage_limit') }}
                        </th>
                        <td>
                            {{ $voucherManagement->usage_limit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherManagement.fields.limit_item') }}
                        </th>
                        <td>
                            {{ $voucherManagement->limit_item }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherManagement.fields.limit_per_user') }}
                        </th>
                        <td>
                            {{ $voucherManagement->limit_per_user }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherManagement.fields.expired') }}
                        </th>
                        <td>
                            {{ $voucherManagement->expired }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherManagement.fields.description') }}
                        </th>
                        <td>
                            {{ $voucherManagement->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherManagement.fields.is_free_shipping') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $voucherManagement->is_free_shipping ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherManagement.fields.is_credit_purchase') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $voucherManagement->is_credit_purchase ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherManagement.fields.redeem_point') }}
                        </th>
                        <td>
                            {{ $voucherManagement->redeem_point }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.voucher-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection