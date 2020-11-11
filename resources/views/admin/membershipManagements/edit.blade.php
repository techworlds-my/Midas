@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.membershipManagement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.membership-managements.update", [$membershipManagement->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_name_id">{{ trans('cruds.membershipManagement.fields.user_name') }}</label>
                <select class="form-control select2 {{ $errors->has('user_name') ? 'is-invalid' : '' }}" name="user_name_id" id="user_name_id" required>
                    @foreach($user_names as $id => $user_name)
                        <option value="{{ $id }}" {{ (old('user_name_id') ? old('user_name_id') : $membershipManagement->user_name->id ?? '') == $id ? 'selected' : '' }}>{{ $user_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('user_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.membershipManagement.fields.user_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="company">{{ trans('cruds.membershipManagement.fields.company') }}</label>
                <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text" name="company" id="company" value="{{ old('company', $membershipManagement->company) }}" required>
                @if($errors->has('company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.membershipManagement.fields.company_helper') }}</span>
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