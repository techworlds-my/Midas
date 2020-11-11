@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.voucherRedeem.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.voucher-redeems.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherRedeem.fields.id') }}
                        </th>
                        <td>
                            {{ $voucherRedeem->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherRedeem.fields.vouchercode') }}
                        </th>
                        <td>
                            {{ $voucherRedeem->vouchercode->vouchercode ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherRedeem.fields.username') }}
                        </th>
                        <td>
                            {{ $voucherRedeem->username }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherRedeem.fields.merchant') }}
                        </th>
                        <td>
                            {{ $voucherRedeem->merchant }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherRedeem.fields.date') }}
                        </th>
                        <td>
                            {{ $voucherRedeem->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherRedeem.fields.amount') }}
                        </th>
                        <td>
                            {{ $voucherRedeem->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherRedeem.fields.type') }}
                        </th>
                        <td>
                            {{ $voucherRedeem->type }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.voucher-redeems.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection