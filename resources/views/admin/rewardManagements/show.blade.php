@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.rewardManagement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reward-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rewardManagement.fields.id') }}
                        </th>
                        <td>
                            {{ $rewardManagement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rewardManagement.fields.merchant') }}
                        </th>
                        <td>
                            {{ $rewardManagement->merchant->merchant ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rewardManagement.fields.category') }}
                        </th>
                        <td>
                            {{ $rewardManagement->category->category ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rewardManagement.fields.expired') }}
                        </th>
                        <td>
                            {{ $rewardManagement->expired }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rewardManagement.fields.title') }}
                        </th>
                        <td>
                            {{ $rewardManagement->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rewardManagement.fields.top_up_amount') }}
                        </th>
                        <td>
                            {{ $rewardManagement->top_up_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rewardManagement.fields.purchase_amount') }}
                        </th>
                        <td>
                            {{ $rewardManagement->purchase_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rewardManagement.fields.referral_amount') }}
                        </th>
                        <td>
                            {{ $rewardManagement->referral_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rewardManagement.fields.bonus') }}
                        </th>
                        <td>
                            {{ $rewardManagement->bonus }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rewardManagement.fields.point') }}
                        </th>
                        <td>
                            {{ $rewardManagement->point }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rewardManagement.fields.voucher') }}
                        </th>
                        <td>
                            {{ $rewardManagement->voucher->vouchercode ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reward-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection