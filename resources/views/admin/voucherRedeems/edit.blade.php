@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.voucherRedeem.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.voucher-redeems.update", [$voucherRedeem->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="vouchercode_id">{{ trans('cruds.voucherRedeem.fields.vouchercode') }}</label>
                <select class="form-control select2 {{ $errors->has('vouchercode') ? 'is-invalid' : '' }}" name="vouchercode_id" id="vouchercode_id" required>
                    @foreach($vouchercodes as $id => $vouchercode)
                        <option value="{{ $id }}" {{ (old('vouchercode_id') ? old('vouchercode_id') : $voucherRedeem->vouchercode->id ?? '') == $id ? 'selected' : '' }}>{{ $vouchercode }}</option>
                    @endforeach
                </select>
                @if($errors->has('vouchercode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vouchercode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherRedeem.fields.vouchercode_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="username">{{ trans('cruds.voucherRedeem.fields.username') }}</label>
                <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" type="text" name="username" id="username" value="{{ old('username', $voucherRedeem->username) }}">
                @if($errors->has('username'))
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherRedeem.fields.username_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="merchant">{{ trans('cruds.voucherRedeem.fields.merchant') }}</label>
                <input class="form-control {{ $errors->has('merchant') ? 'is-invalid' : '' }}" type="text" name="merchant" id="merchant" value="{{ old('merchant', $voucherRedeem->merchant) }}">
                @if($errors->has('merchant'))
                    <div class="invalid-feedback">
                        {{ $errors->first('merchant') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherRedeem.fields.merchant_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date">{{ trans('cruds.voucherRedeem.fields.date') }}</label>
                <input class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $voucherRedeem->date) }}">
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherRedeem.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount">{{ trans('cruds.voucherRedeem.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="text" name="amount" id="amount" value="{{ old('amount', $voucherRedeem->amount) }}">
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherRedeem.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type">{{ trans('cruds.voucherRedeem.fields.type') }}</label>
                <input class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" type="text" name="type" id="type" value="{{ old('type', $voucherRedeem->type) }}">
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherRedeem.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection