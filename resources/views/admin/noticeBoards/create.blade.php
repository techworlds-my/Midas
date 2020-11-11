@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.noticeBoard.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.notice-boards.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.noticeBoard.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.noticeBoard.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="content">{{ trans('cruds.noticeBoard.fields.content') }}</label>
                <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content" required>{{ old('content') }}</textarea>
                @if($errors->has('content'))
                    <div class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.noticeBoard.fields.content_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="post_at">{{ trans('cruds.noticeBoard.fields.post_at') }}</label>
                <input class="form-control datetime {{ $errors->has('post_at') ? 'is-invalid' : '' }}" type="text" name="post_at" id="post_at" value="{{ old('post_at') }}" required>
                @if($errors->has('post_at'))
                    <div class="invalid-feedback">
                        {{ $errors->first('post_at') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.noticeBoard.fields.post_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="post_to">{{ trans('cruds.noticeBoard.fields.post_to') }}</label>
                <input class="form-control {{ $errors->has('post_to') ? 'is-invalid' : '' }}" type="text" name="post_to" id="post_to" value="{{ old('post_to', '') }}" required>
                @if($errors->has('post_to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('post_to') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.noticeBoard.fields.post_to_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pinned">{{ trans('cruds.noticeBoard.fields.pinned') }}</label>
                <input class="form-control {{ $errors->has('pinned') ? 'is-invalid' : '' }}" type="number" name="pinned" id="pinned" value="{{ old('pinned', '0') }}" step="1">
                @if($errors->has('pinned'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pinned') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.noticeBoard.fields.pinned_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.noticeBoard.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', '') }}">
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.noticeBoard.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="post_by">{{ trans('cruds.noticeBoard.fields.post_by') }}</label>
                <input class="form-control {{ $errors->has('post_by') ? 'is-invalid' : '' }}" type="text" name="post_by" id="post_by" value="{{ old('post_by', '') }}">
                @if($errors->has('post_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('post_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.noticeBoard.fields.post_by_helper') }}</span>
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