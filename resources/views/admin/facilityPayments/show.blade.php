@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.facilityPayment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.facility-payments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.facilityPayment.fields.id') }}
                        </th>
                        <td>
                            {{ $facilityPayment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facilityPayment.fields.facility') }}
                        </th>
                        <td>
                            {{ $facilityPayment->facility->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facilityPayment.fields.username') }}
                        </th>
                        <td>
                            {{ $facilityPayment->username->username ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facilityPayment.fields.amount') }}
                        </th>
                        <td>
                            {{ $facilityPayment->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facilityPayment.fields.payment_method') }}
                        </th>
                        <td>
                            {{ $facilityPayment->payment_method->method ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facilityPayment.fields.reciept') }}
                        </th>
                        <td>
                            @if($facilityPayment->reciept)
                                <a href="{{ $facilityPayment->reciept->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facilityPayment.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\FacilityPayment::STATUS_SELECT[$facilityPayment->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.facility-payments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection