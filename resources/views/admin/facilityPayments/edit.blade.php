@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.facilityPayment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.facility-payments.update", [$facilityPayment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="facility_id">{{ trans('cruds.facilityPayment.fields.facility') }}</label>
                <select class="form-control select2 {{ $errors->has('facility') ? 'is-invalid' : '' }}" name="facility_id" id="facility_id" required>
                    @foreach($facilities as $id => $facility)
                        <option value="{{ $id }}" {{ (old('facility_id') ? old('facility_id') : $facilityPayment->facility->id ?? '') == $id ? 'selected' : '' }}>{{ $facility }}</option>
                    @endforeach
                </select>
                @if($errors->has('facility'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facility') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facilityPayment.fields.facility_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="username_id">{{ trans('cruds.facilityPayment.fields.username') }}</label>
                <select class="form-control select2 {{ $errors->has('username') ? 'is-invalid' : '' }}" name="username_id" id="username_id" required>
                    @foreach($usernames as $id => $username)
                        <option value="{{ $id }}" {{ (old('username_id') ? old('username_id') : $facilityPayment->username->id ?? '') == $id ? 'selected' : '' }}>{{ $username }}</option>
                    @endforeach
                </select>
                @if($errors->has('username'))
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facilityPayment.fields.username_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.facilityPayment.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $facilityPayment->amount) }}" step="1" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facilityPayment.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payment_method_id">{{ trans('cruds.facilityPayment.fields.payment_method') }}</label>
                <select class="form-control select2 {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" name="payment_method_id" id="payment_method_id" required>
                    @foreach($payment_methods as $id => $payment_method)
                        <option value="{{ $id }}" {{ (old('payment_method_id') ? old('payment_method_id') : $facilityPayment->payment_method->id ?? '') == $id ? 'selected' : '' }}>{{ $payment_method }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_method'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_method') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facilityPayment.fields.payment_method_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reciept">{{ trans('cruds.facilityPayment.fields.reciept') }}</label>
                <div class="needsclick dropzone {{ $errors->has('reciept') ? 'is-invalid' : '' }}" id="reciept-dropzone">
                </div>
                @if($errors->has('reciept'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reciept') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facilityPayment.fields.reciept_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.facilityPayment.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\FacilityPayment::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $facilityPayment->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facilityPayment.fields.status_helper') }}</span>
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
    Dropzone.options.recieptDropzone = {
    url: '{{ route('admin.facility-payments.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="reciept"]').remove()
      $('form').append('<input type="hidden" name="reciept" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="reciept"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($facilityPayment) && $facilityPayment->reciept)
      var file = {!! json_encode($facilityPayment->reciept) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="reciept" value="' + file.file_name + '">')
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