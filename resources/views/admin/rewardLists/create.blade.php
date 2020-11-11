@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.rewardList.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reward-lists.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="username_id">{{ trans('cruds.rewardList.fields.username') }}</label>
                <select class="form-control select2 {{ $errors->has('username') ? 'is-invalid' : '' }}" name="username_id" id="username_id">
                    @foreach($usernames as $id => $username)
                        <option value="{{ $id }}" {{ old('username_id') == $id ? 'selected' : '' }}>{{ $username }}</option>
                    @endforeach
                </select>
                @if($errors->has('username'))
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rewardList.fields.username_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="reward_id">{{ trans('cruds.rewardList.fields.reward') }}</label>
                <select class="form-control select2 {{ $errors->has('reward') ? 'is-invalid' : '' }}" name="reward_id" id="reward_id" required>
                    @foreach($rewards as $id => $reward)
                        <option value="{{ $id }}" {{ old('reward_id') == $id ? 'selected' : '' }}>{{ $reward }}</option>
                    @endforeach
                </select>
                @if($errors->has('reward'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reward') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rewardList.fields.reward_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="reward_type">{{ trans('cruds.rewardList.fields.reward_type') }}</label>
                <input class="form-control {{ $errors->has('reward_type') ? 'is-invalid' : '' }}" type="text" name="reward_type" id="reward_type" value="{{ old('reward_type', '') }}" required>
                @if($errors->has('reward_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reward_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rewardList.fields.reward_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.rewardList.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="1" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rewardList.fields.amount_helper') }}</span>
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