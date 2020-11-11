@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.memberCardSetting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.member-card-settings.update", [$memberCardSetting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="company">{{ trans('cruds.memberCardSetting.fields.company') }}</label>
                <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text" name="company" id="company" value="{{ old('company', $memberCardSetting->company) }}" required>
                @if($errors->has('company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.memberCardSetting.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="card_image">{{ trans('cruds.memberCardSetting.fields.card_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('card_image') ? 'is-invalid' : '' }}" id="card_image-dropzone">
                </div>
                @if($errors->has('card_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('card_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.memberCardSetting.fields.card_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="format">{{ trans('cruds.memberCardSetting.fields.format') }}</label>
                <input class="form-control {{ $errors->has('format') ? 'is-invalid' : '' }}" type="text" name="format" id="format" value="{{ old('format', $memberCardSetting->format) }}" required>
                @if($errors->has('format'))
                    <div class="invalid-feedback">
                        {{ $errors->first('format') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.memberCardSetting.fields.format_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.cardImageDropzone = {
    url: '{{ route('admin.member-card-settings.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="card_image"]').remove()
      $('form').append('<input type="hidden" name="card_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="card_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($memberCardSetting) && $memberCardSetting->card_image)
      var file = {!! json_encode($memberCardSetting->card_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="card_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection