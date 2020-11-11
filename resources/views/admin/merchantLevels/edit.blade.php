@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.merchantLevel.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.merchant-levels.update", [$merchantLevel->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="level">{{ trans('cruds.merchantLevel.fields.level') }}</label>
                <input class="form-control {{ $errors->has('level') ? 'is-invalid' : '' }}" type="text" name="level" id="level" value="{{ old('level', $merchantLevel->level) }}" required>
                @if($errors->has('level'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantLevel.fields.level_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('in_enable') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="in_enable" id="in_enable" value="1" {{ $merchantLevel->in_enable || old('in_enable', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="in_enable">{{ trans('cruds.merchantLevel.fields.in_enable') }}</label>
                </div>
                @if($errors->has('in_enable'))
                    <div class="invalid-feedback">
                        {{ $errors->first('in_enable') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantLevel.fields.in_enable_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="order_types">{{ trans('cruds.merchantLevel.fields.order_type') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('order_types') ? 'is-invalid' : '' }}" name="order_types[]" id="order_types" multiple required>
                    @foreach($order_types as $id => $order_type)
                        <option value="{{ $id }}" {{ (in_array($id, old('order_types', [])) || $merchantLevel->order_types->contains($id)) ? 'selected' : '' }}>{{ $order_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('order_types'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order_types') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantLevel.fields.order_type_helper') }}</span>
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