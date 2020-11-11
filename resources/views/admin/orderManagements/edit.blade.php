@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.orderManagement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.order-managements.update", [$orderManagement->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="order">{{ trans('cruds.orderManagement.fields.order') }}</label>
                <input class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}" type="text" name="order" id="order" value="{{ old('order', $orderManagement->order) }}">
                @if($errors->has('order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderManagement.fields.order_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status_id">{{ trans('cruds.orderManagement.fields.status') }}</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id" required>
                    @foreach($statuses as $id => $status)
                        <option value="{{ $id }}" {{ (old('status_id') ? old('status_id') : $orderManagement->status->id ?? '') == $id ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderManagement.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="username_id">{{ trans('cruds.orderManagement.fields.username') }}</label>
                <select class="form-control select2 {{ $errors->has('username') ? 'is-invalid' : '' }}" name="username_id" id="username_id" required>
                    @foreach($usernames as $id => $username)
                        <option value="{{ $id }}" {{ (old('username_id') ? old('username_id') : $orderManagement->username->id ?? '') == $id ? 'selected' : '' }}>{{ $username }}</option>
                    @endforeach
                </select>
                @if($errors->has('username'))
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderManagement.fields.username_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="voucher">{{ trans('cruds.orderManagement.fields.voucher') }}</label>
                <input class="form-control {{ $errors->has('voucher') ? 'is-invalid' : '' }}" type="text" name="voucher" id="voucher" value="{{ old('voucher', $orderManagement->voucher) }}">
                @if($errors->has('voucher'))
                    <div class="invalid-feedback">
                        {{ $errors->first('voucher') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderManagement.fields.voucher_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.orderManagement.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $orderManagement->address) }}" required>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderManagement.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.orderManagement.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $orderManagement->price) }}" step="0.01" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderManagement.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="delivery_charge">{{ trans('cruds.orderManagement.fields.delivery_charge') }}</label>
                <input class="form-control {{ $errors->has('delivery_charge') ? 'is-invalid' : '' }}" type="number" name="delivery_charge" id="delivery_charge" value="{{ old('delivery_charge', $orderManagement->delivery_charge) }}" step="0.01">
                @if($errors->has('delivery_charge'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delivery_charge') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderManagement.fields.delivery_charge_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tax">{{ trans('cruds.orderManagement.fields.tax') }}</label>
                <input class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" type="text" name="tax" id="tax" value="{{ old('tax', $orderManagement->tax) }}">
                @if($errors->has('tax'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderManagement.fields.tax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total">{{ trans('cruds.orderManagement.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', $orderManagement->total) }}" step="0.01">
                @if($errors->has('total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderManagement.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="paymentmethod_id">{{ trans('cruds.orderManagement.fields.paymentmethod') }}</label>
                <select class="form-control select2 {{ $errors->has('paymentmethod') ? 'is-invalid' : '' }}" name="paymentmethod_id" id="paymentmethod_id" required>
                    @foreach($paymentmethods as $id => $paymentmethod)
                        <option value="{{ $id }}" {{ (old('paymentmethod_id') ? old('paymentmethod_id') : $orderManagement->paymentmethod->id ?? '') == $id ? 'selected' : '' }}>{{ $paymentmethod }}</option>
                    @endforeach
                </select>
                @if($errors->has('paymentmethod'))
                    <div class="invalid-feedback">
                        {{ $errors->first('paymentmethod') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderManagement.fields.paymentmethod_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comment">{{ trans('cruds.orderManagement.fields.comment') }}</label>
                <input class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" type="text" name="comment" id="comment" value="{{ old('comment', $orderManagement->comment) }}">
                @if($errors->has('comment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderManagement.fields.comment_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="merchant">{{ trans('cruds.orderManagement.fields.merchant') }}</label>
                <input class="form-control {{ $errors->has('merchant') ? 'is-invalid' : '' }}" type="text" name="merchant" id="merchant" value="{{ old('merchant', $orderManagement->merchant) }}" required>
                @if($errors->has('merchant'))
                    <div class="invalid-feedback">
                        {{ $errors->first('merchant') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderManagement.fields.merchant_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transaction">{{ trans('cruds.orderManagement.fields.transaction') }}</label>
                <input class="form-control {{ $errors->has('transaction') ? 'is-invalid' : '' }}" type="text" name="transaction" id="transaction" value="{{ old('transaction', $orderManagement->transaction) }}">
                @if($errors->has('transaction'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transaction') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderManagement.fields.transaction_helper') }}</span>
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