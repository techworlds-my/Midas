@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pointLog.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.point-logs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="username_id">{{ trans('cruds.pointLog.fields.username') }}</label>
                <select class="form-control select2 {{ $errors->has('username') ? 'is-invalid' : '' }}" name="username_id" id="username_id" required>
                    @foreach($usernames as $id => $username)
                        <option value="{{ $id }}" {{ old('username_id') == $id ? 'selected' : '' }}>{{ $username }}</option>
                    @endforeach
                </select>
                @if($errors->has('username'))
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pointLog.fields.username_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_id">{{ trans('cruds.pointLog.fields.title') }}</label>
                <select class="form-control select2 {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title_id" id="title_id" required>
                    @foreach($titles as $id => $title)
                        <option value="{{ $id }}" {{ old('title_id') == $id ? 'selected' : '' }}>{{ $title }}</option>
                    @endforeach
                </select>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pointLog.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="point_gain">{{ trans('cruds.pointLog.fields.point_gain') }}</label>
                <input class="form-control {{ $errors->has('point_gain') ? 'is-invalid' : '' }}" type="number" name="point_gain" id="point_gain" value="{{ old('point_gain', '') }}" step="1" required>
                @if($errors->has('point_gain'))
                    <div class="invalid-feedback">
                        {{ $errors->first('point_gain') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pointLog.fields.point_gain_helper') }}</span>
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