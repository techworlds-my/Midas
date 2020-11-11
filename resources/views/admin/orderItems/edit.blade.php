@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.orderItem.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.order-items.update", [$orderItem->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="order">{{ trans('cruds.orderItem.fields.order') }}</label>
                <input class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}" type="text" name="order" id="order" value="{{ old('order', $orderItem->order) }}" required>
                @if($errors->has('order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.order_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="item">{{ trans('cruds.orderItem.fields.item') }}</label>
                <input class="form-control {{ $errors->has('item') ? 'is-invalid' : '' }}" type="text" name="item" id="item" value="{{ old('item', $orderItem->item) }}" required>
                @if($errors->has('item'))
                    <div class="invalid-feedback">
                        {{ $errors->first('item') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.item_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.orderItem.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $orderItem->quantity) }}" step="1" required>
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.orderItem.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $orderItem->price) }}" step="1" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="add_on">{{ trans('cruds.orderItem.fields.add_on') }}</label>
                <input class="form-control {{ $errors->has('add_on') ? 'is-invalid' : '' }}" type="text" name="add_on" id="add_on" value="{{ old('add_on', $orderItem->add_on) }}">
                @if($errors->has('add_on'))
                    <div class="invalid-feedback">
                        {{ $errors->first('add_on') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.add_on_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="add_on_price">{{ trans('cruds.orderItem.fields.add_on_price') }}</label>
                <input class="form-control {{ $errors->has('add_on_price') ? 'is-invalid' : '' }}" type="text" name="add_on_price" id="add_on_price" value="{{ old('add_on_price', $orderItem->add_on_price) }}">
                @if($errors->has('add_on_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('add_on_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.add_on_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sub_total">{{ trans('cruds.orderItem.fields.sub_total') }}</label>
                <input class="form-control {{ $errors->has('sub_total') ? 'is-invalid' : '' }}" type="text" name="sub_total" id="sub_total" value="{{ old('sub_total', $orderItem->sub_total) }}" required>
                @if($errors->has('sub_total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.sub_total_helper') }}</span>
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