@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.pointCondition.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.point-conditions.update", [$pointCondition->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.pointCondition.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $pointCondition->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pointCondition.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_enable') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_enable" id="is_enable" value="1" {{ $pointCondition->is_enable || old('is_enable', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="is_enable">{{ trans('cruds.pointCondition.fields.is_enable') }}</label>
                </div>
                @if($errors->has('is_enable'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_enable') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pointCondition.fields.is_enable_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="point_add">{{ trans('cruds.pointCondition.fields.point_add') }}</label>
                <input class="form-control {{ $errors->has('point_add') ? 'is-invalid' : '' }}" type="number" name="point_add" id="point_add" value="{{ old('point_add', $pointCondition->point_add) }}" step="1" required>
                @if($errors->has('point_add'))
                    <div class="invalid-feedback">
                        {{ $errors->first('point_add') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pointCondition.fields.point_add_helper') }}</span>
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