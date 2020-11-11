@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.shopRental.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shop-rentals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.shopRental.fields.id') }}
                        </th>
                        <td>
                            {{ $shopRental->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shopRental.fields.merchant') }}
                        </th>
                        <td>
                            {{ $shopRental->merchant->merchant ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shopRental.fields.date') }}
                        </th>
                        <td>
                            {{ $shopRental->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shopRental.fields.amount') }}
                        </th>
                        <td>
                            {{ $shopRental->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shopRental.fields.status') }}
                        </th>
                        <td>
                            {{ $shopRental->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shopRental.fields.payment_method') }}
                        </th>
                        <td>
                            {{ $shopRental->payment_method }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shop-rentals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection