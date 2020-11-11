@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.merchantSubCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.merchant-sub-categories.update", [$merchantSubCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="cateogry_id">{{ trans('cruds.merchantSubCategory.fields.cateogry') }}</label>
                <select class="form-control select2 {{ $errors->has('cateogry') ? 'is-invalid' : '' }}" name="cateogry_id" id="cateogry_id">
                    @foreach($cateogries as $id => $cateogry)
                        <option value="{{ $id }}" {{ (old('cateogry_id') ? old('cateogry_id') : $merchantSubCategory->cateogry->id ?? '') == $id ? 'selected' : '' }}>{{ $cateogry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cateogry'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cateogry') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantSubCategory.fields.cateogry_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sub_category">{{ trans('cruds.merchantSubCategory.fields.sub_category') }}</label>
                <input class="form-control {{ $errors->has('sub_category') ? 'is-invalid' : '' }}" type="text" name="sub_category" id="sub_category" value="{{ old('sub_category', $merchantSubCategory->sub_category) }}" required>
                @if($errors->has('sub_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantSubCategory.fields.sub_category_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('in_enable') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="in_enable" id="in_enable" value="1" {{ $merchantSubCategory->in_enable || old('in_enable', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="in_enable">{{ trans('cruds.merchantSubCategory.fields.in_enable') }}</label>
                </div>
                @if($errors->has('in_enable'))
                    <div class="invalid-feedback">
                        {{ $errors->first('in_enable') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantSubCategory.fields.in_enable_helper') }}</span>
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