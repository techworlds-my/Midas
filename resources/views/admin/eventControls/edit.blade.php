@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.eventControl.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.event-controls.update", [$eventControl->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.eventControl.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $eventControl->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eventControl.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.eventControl.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $eventControl->category->id ?? '') == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eventControl.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.eventControl.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $eventControl->date) }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eventControl.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="time">{{ trans('cruds.eventControl.fields.time') }}</label>
                <input class="form-control timepicker {{ $errors->has('time') ? 'is-invalid' : '' }}" type="text" name="time" id="time" value="{{ old('time', $eventControl->time) }}" required>
                @if($errors->has('time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eventControl.fields.time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="audience_groups">{{ trans('cruds.eventControl.fields.audience_group') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('audience_groups') ? 'is-invalid' : '' }}" name="audience_groups[]" id="audience_groups" multiple>
                    @foreach($audience_groups as $id => $audience_group)
                        <option value="{{ $id }}" {{ (in_array($id, old('audience_groups', [])) || $eventControl->audience_groups->contains($id)) ? 'selected' : '' }}>{{ $audience_group }}</option>
                    @endforeach
                </select>
                @if($errors->has('audience_groups'))
                    <div class="invalid-feedback">
                        {{ $errors->first('audience_groups') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eventControl.fields.audience_group_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment">{{ trans('cruds.eventControl.fields.payment') }}</label>
                <input class="form-control {{ $errors->has('payment') ? 'is-invalid' : '' }}" type="text" name="payment" id="payment" value="{{ old('payment', $eventControl->payment) }}">
                @if($errors->has('payment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eventControl.fields.payment_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="participants">{{ trans('cruds.eventControl.fields.participants') }}</label>
                <input class="form-control {{ $errors->has('participants') ? 'is-invalid' : '' }}" type="number" name="participants" id="participants" value="{{ old('participants', $eventControl->participants) }}" step="1">
                @if($errors->has('participants'))
                    <div class="invalid-feedback">
                        {{ $errors->first('participants') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eventControl.fields.participants_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.eventControl.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $eventControl->status) }}" required>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eventControl.fields.status_helper') }}</span>
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