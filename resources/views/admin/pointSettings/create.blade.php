@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pointSetting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.point-settings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="point_ratio">{{ trans('cruds.pointSetting.fields.point_ratio') }}</label>
                <input class="form-control {{ $errors->has('point_ratio') ? 'is-invalid' : '' }}" type="number" name="point_ratio" id="point_ratio" value="{{ old('point_ratio', '') }}" step="1" required>
                @if($errors->has('point_ratio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('point_ratio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pointSetting.fields.point_ratio_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_enable') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_enable" id="is_enable" value="1" required {{ old('is_enable', 0) == 1 ? 'checked' : '' }}>
                    <label class="required form-check-label" for="is_enable">{{ trans('cruds.pointSetting.fields.is_enable') }}</label>
                </div>
                @if($errors->has('is_enable'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_enable') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pointSetting.fields.is_enable_helper') }}</span>
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