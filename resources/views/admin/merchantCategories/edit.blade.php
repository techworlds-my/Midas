@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.merchantCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.merchant-categories.update", [$merchantCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="cateogry">{{ trans('cruds.merchantCategory.fields.cateogry') }}</label>
                <input class="form-control {{ $errors->has('cateogry') ? 'is-invalid' : '' }}" type="text" name="cateogry" id="cateogry" value="{{ old('cateogry', $merchantCategory->cateogry) }}" required>
                @if($errors->has('cateogry'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cateogry') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantCategory.fields.cateogry_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_enable') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_enable" id="is_enable" value="1" {{ $merchantCategory->is_enable || old('is_enable', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="is_enable">{{ trans('cruds.merchantCategory.fields.is_enable') }}</label>
                </div>
                @if($errors->has('is_enable'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_enable') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantCategory.fields.is_enable_helper') }}</span>
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