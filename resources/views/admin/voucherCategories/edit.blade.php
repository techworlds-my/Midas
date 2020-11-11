@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.voucherCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.voucher-categories.update", [$voucherCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="cateogry">{{ trans('cruds.voucherCategory.fields.cateogry') }}</label>
                <input class="form-control {{ $errors->has('cateogry') ? 'is-invalid' : '' }}" type="text" name="cateogry" id="cateogry" value="{{ old('cateogry', $voucherCategory->cateogry) }}" required>
                @if($errors->has('cateogry'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cateogry') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherCategory.fields.cateogry_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('in_enable') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="in_enable" id="in_enable" value="1" {{ $voucherCategory->in_enable || old('in_enable', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="in_enable">{{ trans('cruds.voucherCategory.fields.in_enable') }}</label>
                </div>
                @if($errors->has('in_enable'))
                    <div class="invalid-feedback">
                        {{ $errors->first('in_enable') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherCategory.fields.in_enable_helper') }}</span>
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