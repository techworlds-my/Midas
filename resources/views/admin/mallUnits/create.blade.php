@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.mallUnit.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.mall-units.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="unit_no">{{ trans('cruds.mallUnit.fields.unit_no') }}</label>
                <input class="form-control {{ $errors->has('unit_no') ? 'is-invalid' : '' }}" type="text" name="unit_no" id="unit_no" value="{{ old('unit_no', '') }}" required>
                @if($errors->has('unit_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mallUnit.fields.unit_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="floor">{{ trans('cruds.mallUnit.fields.floor') }}</label>
                <input class="form-control {{ $errors->has('floor') ? 'is-invalid' : '' }}" type="text" name="floor" id="floor" value="{{ old('floor', '') }}" required>
                @if($errors->has('floor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('floor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mallUnit.fields.floor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="merchant_id">{{ trans('cruds.mallUnit.fields.merchant') }}</label>
                <select class="form-control select2 {{ $errors->has('merchant') ? 'is-invalid' : '' }}" name="merchant_id" id="merchant_id">
                    @foreach($merchants as $id => $merchant)
                        <option value="{{ $id }}" {{ old('merchant_id') == $id ? 'selected' : '' }}>{{ $merchant }}</option>
                    @endforeach
                </select>
                @if($errors->has('merchant'))
                    <div class="invalid-feedback">
                        {{ $errors->first('merchant') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mallUnit.fields.merchant_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="size">{{ trans('cruds.mallUnit.fields.size') }}</label>
                <input class="form-control {{ $errors->has('size') ? 'is-invalid' : '' }}" type="text" name="size" id="size" value="{{ old('size', '') }}" required>
                @if($errors->has('size'))
                    <div class="invalid-feedback">
                        {{ $errors->first('size') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mallUnit.fields.size_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.mallUnit.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', '') }}" required>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mallUnit.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="rental">{{ trans('cruds.mallUnit.fields.rental') }}</label>
                <input class="form-control {{ $errors->has('rental') ? 'is-invalid' : '' }}" type="text" name="rental" id="rental" value="{{ old('rental', '') }}" required>
                @if($errors->has('rental'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rental') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mallUnit.fields.rental_helper') }}</span>
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