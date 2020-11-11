@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.rewardManagement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reward-managements.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="merchant_id">{{ trans('cruds.rewardManagement.fields.merchant') }}</label>
                <select class="form-control select2 {{ $errors->has('merchant') ? 'is-invalid' : '' }}" name="merchant_id" id="merchant_id" required>
                    @foreach($merchants as $id => $merchant)
                        <option value="{{ $id }}" {{ old('merchant_id') == $id ? 'selected' : '' }}>{{ $merchant }}</option>
                    @endforeach
                </select>
                @if($errors->has('merchant'))
                    <div class="invalid-feedback">
                        {{ $errors->first('merchant') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rewardManagement.fields.merchant_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.rewardManagement.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rewardManagement.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="expired">{{ trans('cruds.rewardManagement.fields.expired') }}</label>
                <input class="form-control datetime {{ $errors->has('expired') ? 'is-invalid' : '' }}" type="text" name="expired" id="expired" value="{{ old('expired') }}" required>
                @if($errors->has('expired'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expired') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rewardManagement.fields.expired_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.rewardManagement.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rewardManagement.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="top_up_amount">{{ trans('cruds.rewardManagement.fields.top_up_amount') }}</label>
                <input class="form-control {{ $errors->has('top_up_amount') ? 'is-invalid' : '' }}" type="number" name="top_up_amount" id="top_up_amount" value="{{ old('top_up_amount', '') }}" step="1">
                @if($errors->has('top_up_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('top_up_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rewardManagement.fields.top_up_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="purchase_amount">{{ trans('cruds.rewardManagement.fields.purchase_amount') }}</label>
                <input class="form-control {{ $errors->has('purchase_amount') ? 'is-invalid' : '' }}" type="number" name="purchase_amount" id="purchase_amount" value="{{ old('purchase_amount', '') }}" step="1">
                @if($errors->has('purchase_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('purchase_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rewardManagement.fields.purchase_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="referral_amount">{{ trans('cruds.rewardManagement.fields.referral_amount') }}</label>
                <input class="form-control {{ $errors->has('referral_amount') ? 'is-invalid' : '' }}" type="text" name="referral_amount" id="referral_amount" value="{{ old('referral_amount', '') }}">
                @if($errors->has('referral_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('referral_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rewardManagement.fields.referral_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bonus">{{ trans('cruds.rewardManagement.fields.bonus') }}</label>
                <input class="form-control {{ $errors->has('bonus') ? 'is-invalid' : '' }}" type="number" name="bonus" id="bonus" value="{{ old('bonus', '') }}" step="1">
                @if($errors->has('bonus'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bonus') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rewardManagement.fields.bonus_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="point">{{ trans('cruds.rewardManagement.fields.point') }}</label>
                <input class="form-control {{ $errors->has('point') ? 'is-invalid' : '' }}" type="text" name="point" id="point" value="{{ old('point', '') }}">
                @if($errors->has('point'))
                    <div class="invalid-feedback">
                        {{ $errors->first('point') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rewardManagement.fields.point_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="voucher_id">{{ trans('cruds.rewardManagement.fields.voucher') }}</label>
                <select class="form-control select2 {{ $errors->has('voucher') ? 'is-invalid' : '' }}" name="voucher_id" id="voucher_id">
                    @foreach($vouchers as $id => $voucher)
                        <option value="{{ $id }}" {{ old('voucher_id') == $id ? 'selected' : '' }}>{{ $voucher }}</option>
                    @endforeach
                </select>
                @if($errors->has('voucher'))
                    <div class="invalid-feedback">
                        {{ $errors->first('voucher') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rewardManagement.fields.voucher_helper') }}</span>
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