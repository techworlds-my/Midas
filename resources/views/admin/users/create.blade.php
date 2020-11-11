@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="username">{{ trans('cruds.user.fields.username') }}</label>
                <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" type="text" name="username" id="username" value="{{ old('username', '') }}" required>
                @if($errors->has('username'))
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.username_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <div class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_credit">{{ trans('cruds.user.fields.total_credit') }}</label>
                <input class="form-control {{ $errors->has('total_credit') ? 'is-invalid' : '' }}" type="number" name="total_credit" id="total_credit" value="{{ old('total_credit', '') }}" step="1">
                @if($errors->has('total_credit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_credit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.total_credit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="current_credit">{{ trans('cruds.user.fields.current_credit') }}</label>
                <input class="form-control {{ $errors->has('current_credit') ? 'is-invalid' : '' }}" type="number" name="current_credit" id="current_credit" value="{{ old('current_credit', '') }}" step="1">
                @if($errors->has('current_credit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('current_credit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.current_credit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_point">{{ trans('cruds.user.fields.total_point') }}</label>
                <input class="form-control {{ $errors->has('total_point') ? 'is-invalid' : '' }}" type="number" name="total_point" id="total_point" value="{{ old('total_point', '') }}" step="1">
                @if($errors->has('total_point'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_point') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.total_point_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="current_point">{{ trans('cruds.user.fields.current_point') }}</label>
                <input class="form-control {{ $errors->has('current_point') ? 'is-invalid' : '' }}" type="number" name="current_point" id="current_point" value="{{ old('current_point', '') }}" step="1">
                @if($errors->has('current_point'))
                    <div class="invalid-feedback">
                        {{ $errors->first('current_point') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.current_point_helper') }}</span>
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