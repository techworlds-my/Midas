@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.voucherManagement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.voucher-managements.update", [$voucherManagement->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="merchant_id">{{ trans('cruds.voucherManagement.fields.merchant') }}</label>
                <select class="form-control select2 {{ $errors->has('merchant') ? 'is-invalid' : '' }}" name="merchant_id" id="merchant_id" required>
                    @foreach($merchants as $id => $merchant)
                        <option value="{{ $id }}" {{ (old('merchant_id') ? old('merchant_id') : $voucherManagement->merchant->id ?? '') == $id ? 'selected' : '' }}>{{ $merchant }}</option>
                    @endforeach
                </select>
                @if($errors->has('merchant'))
                    <div class="invalid-feedback">
                        {{ $errors->first('merchant') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherManagement.fields.merchant_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="vouchercode">{{ trans('cruds.voucherManagement.fields.vouchercode') }}</label>
                <input class="form-control {{ $errors->has('vouchercode') ? 'is-invalid' : '' }}" type="text" name="vouchercode" id="vouchercode" value="{{ old('vouchercode', $voucherManagement->vouchercode) }}" required>
                @if($errors->has('vouchercode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vouchercode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherManagement.fields.vouchercode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.voucherManagement.fields.discount_type') }}</label>
                <select class="form-control {{ $errors->has('discount_type') ? 'is-invalid' : '' }}" name="discount_type" id="discount_type" required>
                    <option value disabled {{ old('discount_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\VoucherManagement::DISCOUNT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('discount_type', $voucherManagement->discount_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('discount_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherManagement.fields.discount_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="value">{{ trans('cruds.voucherManagement.fields.value') }}</label>
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="number" name="value" id="value" value="{{ old('value', $voucherManagement->value) }}" step="1" required>
                @if($errors->has('value'))
                    <div class="invalid-feedback">
                        {{ $errors->first('value') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherManagement.fields.value_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="min_spend">{{ trans('cruds.voucherManagement.fields.min_spend') }}</label>
                <input class="form-control {{ $errors->has('min_spend') ? 'is-invalid' : '' }}" type="number" name="min_spend" id="min_spend" value="{{ old('min_spend', $voucherManagement->min_spend) }}" step="1">
                @if($errors->has('min_spend'))
                    <div class="invalid-feedback">
                        {{ $errors->first('min_spend') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherManagement.fields.min_spend_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="max_spend">{{ trans('cruds.voucherManagement.fields.max_spend') }}</label>
                <input class="form-control {{ $errors->has('max_spend') ? 'is-invalid' : '' }}" type="number" name="max_spend" id="max_spend" value="{{ old('max_spend', $voucherManagement->max_spend) }}" step="1">
                @if($errors->has('max_spend'))
                    <div class="invalid-feedback">
                        {{ $errors->first('max_spend') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherManagement.fields.max_spend_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('excluded_sales_item') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="excluded_sales_item" value="0">
                    <input class="form-check-input" type="checkbox" name="excluded_sales_item" id="excluded_sales_item" value="1" {{ $voucherManagement->excluded_sales_item || old('excluded_sales_item', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="excluded_sales_item">{{ trans('cruds.voucherManagement.fields.excluded_sales_item') }}</label>
                </div>
                @if($errors->has('excluded_sales_item'))
                    <div class="invalid-feedback">
                        {{ $errors->first('excluded_sales_item') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherManagement.fields.excluded_sales_item_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_category_id">{{ trans('cruds.voucherManagement.fields.item_category') }}</label>
                <select class="form-control select2 {{ $errors->has('item_category') ? 'is-invalid' : '' }}" name="item_category_id" id="item_category_id">
                    @foreach($item_categories as $id => $item_category)
                        <option value="{{ $id }}" {{ (old('item_category_id') ? old('item_category_id') : $voucherManagement->item_category->id ?? '') == $id ? 'selected' : '' }}>{{ $item_category }}</option>
                    @endforeach
                </select>
                @if($errors->has('item_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('item_category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherManagement.fields.item_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="items">{{ trans('cruds.voucherManagement.fields.item') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('items') ? 'is-invalid' : '' }}" name="items[]" id="items" multiple>
                    @foreach($items as $id => $item)
                        <option value="{{ $id }}" {{ (in_array($id, old('items', [])) || $voucherManagement->items->contains($id)) ? 'selected' : '' }}>{{ $item }}</option>
                    @endforeach
                </select>
                @if($errors->has('items'))
                    <div class="invalid-feedback">
                        {{ $errors->first('items') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherManagement.fields.item_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="usage_limit">{{ trans('cruds.voucherManagement.fields.usage_limit') }}</label>
                <input class="form-control {{ $errors->has('usage_limit') ? 'is-invalid' : '' }}" type="number" name="usage_limit" id="usage_limit" value="{{ old('usage_limit', $voucherManagement->usage_limit) }}" step="1">
                @if($errors->has('usage_limit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('usage_limit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherManagement.fields.usage_limit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="limit_item">{{ trans('cruds.voucherManagement.fields.limit_item') }}</label>
                <input class="form-control {{ $errors->has('limit_item') ? 'is-invalid' : '' }}" type="number" name="limit_item" id="limit_item" value="{{ old('limit_item', $voucherManagement->limit_item) }}" step="1">
                @if($errors->has('limit_item'))
                    <div class="invalid-feedback">
                        {{ $errors->first('limit_item') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherManagement.fields.limit_item_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="limit_per_user">{{ trans('cruds.voucherManagement.fields.limit_per_user') }}</label>
                <input class="form-control {{ $errors->has('limit_per_user') ? 'is-invalid' : '' }}" type="number" name="limit_per_user" id="limit_per_user" value="{{ old('limit_per_user', $voucherManagement->limit_per_user) }}" step="1">
                @if($errors->has('limit_per_user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('limit_per_user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherManagement.fields.limit_per_user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="expired">{{ trans('cruds.voucherManagement.fields.expired') }}</label>
                <input class="form-control datetime {{ $errors->has('expired') ? 'is-invalid' : '' }}" type="text" name="expired" id="expired" value="{{ old('expired', $voucherManagement->expired) }}" required>
                @if($errors->has('expired'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expired') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherManagement.fields.expired_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.voucherManagement.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $voucherManagement->description) }}" required>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherManagement.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_free_shipping') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_free_shipping" value="0">
                    <input class="form-check-input" type="checkbox" name="is_free_shipping" id="is_free_shipping" value="1" {{ $voucherManagement->is_free_shipping || old('is_free_shipping', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_free_shipping">{{ trans('cruds.voucherManagement.fields.is_free_shipping') }}</label>
                </div>
                @if($errors->has('is_free_shipping'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_free_shipping') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherManagement.fields.is_free_shipping_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_credit_purchase') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_credit_purchase" value="0">
                    <input class="form-check-input" type="checkbox" name="is_credit_purchase" id="is_credit_purchase" value="1" {{ $voucherManagement->is_credit_purchase || old('is_credit_purchase', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_credit_purchase">{{ trans('cruds.voucherManagement.fields.is_credit_purchase') }}</label>
                </div>
                @if($errors->has('is_credit_purchase'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_credit_purchase') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherManagement.fields.is_credit_purchase_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="redeem_point">{{ trans('cruds.voucherManagement.fields.redeem_point') }}</label>
                <input class="form-control {{ $errors->has('redeem_point') ? 'is-invalid' : '' }}" type="text" name="redeem_point" id="redeem_point" value="{{ old('redeem_point', $voucherManagement->redeem_point) }}">
                @if($errors->has('redeem_point'))
                    <div class="invalid-feedback">
                        {{ $errors->first('redeem_point') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherManagement.fields.redeem_point_helper') }}</span>
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