@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.rewardList.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reward-lists.update", [$rewardList->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="reward_type">{{ trans('cruds.rewardList.fields.reward_type') }}</label>
                <input class="form-control {{ $errors->has('reward_type') ? 'is-invalid' : '' }}" type="text" name="reward_type" id="reward_type" value="{{ old('reward_type', $rewardList->reward_type) }}" required>
                @if($errors->has('reward_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reward_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rewardList.fields.reward_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.rewardList.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $rewardList->amount) }}" step="1" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rewardList.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="username">{{ trans('cruds.rewardList.fields.username') }}</label>
                <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" type="text" name="username" id="username" value="{{ old('username', $rewardList->username) }}">
                @if($errors->has('username'))
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rewardList.fields.username_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reward">{{ trans('cruds.rewardList.fields.reward') }}</label>
                <input class="form-control {{ $errors->has('reward') ? 'is-invalid' : '' }}" type="text" name="reward" id="reward" value="{{ old('reward', $rewardList->reward) }}">
                @if($errors->has('reward'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reward') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rewardList.fields.reward_helper') }}</span>
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