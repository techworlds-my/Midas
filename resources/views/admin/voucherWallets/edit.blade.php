@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.voucherWallet.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.voucher-wallets.update", [$voucherWallet->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_redeem') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_redeem" id="is_redeem" value="1" {{ $voucherWallet->is_redeem || old('is_redeem', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="is_redeem">{{ trans('cruds.voucherWallet.fields.is_redeem') }}</label>
                </div>
                @if($errors->has('is_redeem'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_redeem') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherWallet.fields.is_redeem_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="usage">{{ trans('cruds.voucherWallet.fields.usage') }}</label>
                <input class="form-control {{ $errors->has('usage') ? 'is-invalid' : '' }}" type="text" name="usage" id="usage" value="{{ old('usage', $voucherWallet->usage) }}">
                @if($errors->has('usage'))
                    <div class="invalid-feedback">
                        {{ $errors->first('usage') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherWallet.fields.usage_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="username">{{ trans('cruds.voucherWallet.fields.username') }}</label>
                <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" type="text" name="username" id="username" value="{{ old('username', $voucherWallet->username) }}" required>
                @if($errors->has('username'))
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherWallet.fields.username_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="voucher">{{ trans('cruds.voucherWallet.fields.voucher') }}</label>
                <input class="form-control {{ $errors->has('voucher') ? 'is-invalid' : '' }}" type="text" name="voucher" id="voucher" value="{{ old('voucher', $voucherWallet->voucher) }}">
                @if($errors->has('voucher'))
                    <div class="invalid-feedback">
                        {{ $errors->first('voucher') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherWallet.fields.voucher_helper') }}</span>
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