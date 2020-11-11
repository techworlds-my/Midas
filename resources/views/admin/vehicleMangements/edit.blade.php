@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.vehicleMangement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.vehicle-mangements.update", [$vehicleMangement->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="username_id">{{ trans('cruds.vehicleMangement.fields.username') }}</label>
                <select class="form-control select2 {{ $errors->has('username') ? 'is-invalid' : '' }}" name="username_id" id="username_id" required>
                    @foreach($usernames as $id => $username)
                        <option value="{{ $id }}" {{ (old('username_id') ? old('username_id') : $vehicleMangement->username->id ?? '') == $id ? 'selected' : '' }}>{{ $username }}</option>
                    @endforeach
                </select>
                @if($errors->has('username'))
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleMangement.fields.username_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="car_plate">{{ trans('cruds.vehicleMangement.fields.car_plate') }}</label>
                <input class="form-control {{ $errors->has('car_plate') ? 'is-invalid' : '' }}" type="text" name="car_plate" id="car_plate" value="{{ old('car_plate', $vehicleMangement->car_plate) }}" required>
                @if($errors->has('car_plate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('car_plate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleMangement.fields.car_plate_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_verify') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_verify" value="0">
                    <input class="form-check-input" type="checkbox" name="is_verify" id="is_verify" value="1" {{ $vehicleMangement->is_verify || old('is_verify', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_verify">{{ trans('cruds.vehicleMangement.fields.is_verify') }}</label>
                </div>
                @if($errors->has('is_verify'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_verify') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleMangement.fields.is_verify_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="brand_id">{{ trans('cruds.vehicleMangement.fields.brand') }}</label>
                <select class="form-control select2 {{ $errors->has('brand') ? 'is-invalid' : '' }}" name="brand_id" id="brand_id">
                    @foreach($brands as $id => $brand)
                        <option value="{{ $id }}" {{ (old('brand_id') ? old('brand_id') : $vehicleMangement->brand->id ?? '') == $id ? 'selected' : '' }}>{{ $brand }}</option>
                    @endforeach
                </select>
                @if($errors->has('brand'))
                    <div class="invalid-feedback">
                        {{ $errors->first('brand') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleMangement.fields.brand_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="model">{{ trans('cruds.vehicleMangement.fields.model') }}</label>
                <input class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" type="text" name="model" id="model" value="{{ old('model', $vehicleMangement->model) }}">
                @if($errors->has('model'))
                    <div class="invalid-feedback">
                        {{ $errors->first('model') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleMangement.fields.model_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="color">{{ trans('cruds.vehicleMangement.fields.color') }}</label>
                <input class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}" type="text" name="color" id="color" value="{{ old('color', $vehicleMangement->color) }}">
                @if($errors->has('color'))
                    <div class="invalid-feedback">
                        {{ $errors->first('color') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleMangement.fields.color_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_season_park') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_season_park" id="is_season_park" value="1" {{ $vehicleMangement->is_season_park || old('is_season_park', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="is_season_park">{{ trans('cruds.vehicleMangement.fields.is_season_park') }}</label>
                </div>
                @if($errors->has('is_season_park'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_season_park') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleMangement.fields.is_season_park_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="driver_count">{{ trans('cruds.vehicleMangement.fields.driver_count') }}</label>
                <input class="form-control {{ $errors->has('driver_count') ? 'is-invalid' : '' }}" type="number" name="driver_count" id="driver_count" value="{{ old('driver_count', $vehicleMangement->driver_count) }}" step="1">
                @if($errors->has('driver_count'))
                    <div class="invalid-feedback">
                        {{ $errors->first('driver_count') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleMangement.fields.driver_count_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_resident') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_resident" id="is_resident" value="1" {{ $vehicleMangement->is_resident || old('is_resident', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="is_resident">{{ trans('cruds.vehicleMangement.fields.is_resident') }}</label>
                </div>
                @if($errors->has('is_resident'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_resident') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleMangement.fields.is_resident_helper') }}</span>
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