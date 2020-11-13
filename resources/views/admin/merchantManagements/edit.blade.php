@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.merchantManagement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.merchant-managements.update", [$merchantManagement->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="company_name">{{ trans('cruds.merchantManagement.fields.company_name') }}</label>
                <input class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" type="text" name="company_name" id="company_name" value="{{ old('company_name', $merchantManagement->company_name) }}" required>
                @if($errors->has('company_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantManagement.fields.company_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ssm">{{ trans('cruds.merchantManagement.fields.ssm') }}</label>
                <input class="form-control {{ $errors->has('ssm') ? 'is-invalid' : '' }}" type="text" name="ssm" id="ssm" value="{{ old('ssm', $merchantManagement->ssm) }}">
                @if($errors->has('ssm'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ssm') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantManagement.fields.ssm_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.merchantManagement.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $merchantManagement->address) }}" required>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantManagement.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="postcode">{{ trans('cruds.merchantManagement.fields.postcode') }}</label>
                <input class="form-control {{ $errors->has('postcode') ? 'is-invalid' : '' }}" type="text" name="postcode" id="postcode" value="{{ old('postcode', $merchantManagement->postcode) }}">
                @if($errors->has('postcode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('postcode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantManagement.fields.postcode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="in_charge_person">{{ trans('cruds.merchantManagement.fields.in_charge_person') }}</label>
                <input class="form-control {{ $errors->has('in_charge_person') ? 'is-invalid' : '' }}" type="text" name="in_charge_person" id="in_charge_person" value="{{ old('in_charge_person', $merchantManagement->in_charge_person) }}" required>
                @if($errors->has('in_charge_person'))
                    <div class="invalid-feedback">
                        {{ $errors->first('in_charge_person') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantManagement.fields.in_charge_person_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contact">{{ trans('cruds.merchantManagement.fields.contact') }}</label>
                <input class="form-control {{ $errors->has('contact') ? 'is-invalid' : '' }}" type="text" name="contact" id="contact" value="{{ old('contact', $merchantManagement->contact) }}" required>
                @if($errors->has('contact'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantManagement.fields.contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.merchantManagement.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $merchantManagement->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantManagement.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="position">{{ trans('cruds.merchantManagement.fields.position') }}</label>
                <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" type="text" name="position" id="position" value="{{ old('position', $merchantManagement->position) }}" required>
                @if($errors->has('position'))
                    <div class="invalid-feedback">
                        {{ $errors->first('position') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantManagement.fields.position_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.merchantManagement.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $merchantManagement->category->id ?? '') == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantManagement.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sub_cateogry_id">{{ trans('cruds.merchantManagement.fields.sub_cateogry') }}</label>
                <select class="form-control select2 {{ $errors->has('sub_cateogry') ? 'is-invalid' : '' }}" name="sub_cateogry_id" id="sub_cateogry_id" required>
                    @foreach($sub_cateogries as $id => $sub_cateogry)
                        <option value="{{ $id }}" {{ (old('sub_cateogry_id') ? old('sub_cateogry_id') : $merchantManagement->sub_cateogry->id ?? '') == $id ? 'selected' : '' }}>{{ $sub_cateogry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sub_cateogry'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_cateogry') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantManagement.fields.sub_cateogry_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="website">{{ trans('cruds.merchantManagement.fields.website') }}</label>
                <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" value="{{ old('website', $merchantManagement->website) }}">
                @if($errors->has('website'))
                    <div class="invalid-feedback">
                        {{ $errors->first('website') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantManagement.fields.website_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.merchantManagement.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', $merchantManagement->facebook) }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantManagement.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.merchantManagement.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', $merchantManagement->instagram) }}">
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantManagement.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_id">{{ trans('cruds.merchantManagement.fields.level') }}</label>
                <select class="form-control select2 {{ $errors->has('level') ? 'is-invalid' : '' }}" name="level_id" id="level_id" required>
                    @foreach($levels as $id => $level)
                        <option value="{{ $id }}" {{ (old('level_id') ? old('level_id') : $merchantManagement->level->id ?? '') == $id ? 'selected' : '' }}>{{ $level }}</option>
                    @endforeach
                </select>
                @if($errors->has('level'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantManagement.fields.level_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="merchant">{{ trans('cruds.merchantManagement.fields.merchant') }}</label>
                <input class="form-control {{ $errors->has('merchant') ? 'is-invalid' : '' }}" type="text" name="merchant" id="merchant" value="{{ old('merchant', $merchantManagement->merchant) }}">
                @if($errors->has('merchant'))
                    <div class="invalid-feedback">
                        {{ $errors->first('merchant') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantManagement.fields.merchant_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="merchant_admin">{{ trans('cruds.merchantManagement.fields.merchant_admin') }}</label>
                <input class="form-control {{ $errors->has('merchant_admin') ? 'is-invalid' : '' }}" type="text" name="merchant_admin" id="merchant_admin" value="{{ old('merchant_admin', $merchantManagement->merchant_admin) }}">
                @if($errors->has('merchant_admin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('merchant_admin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantManagement.fields.merchant_admin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="merchant_manager">{{ trans('cruds.merchantManagement.fields.merchant_manager') }}</label>
                <input class="form-control {{ $errors->has('merchant_manager') ? 'is-invalid' : '' }}" type="text" name="merchant_manager" id="merchant_manager" value="{{ old('merchant_manager', $merchantManagement->merchant_manager) }}">
                @if($errors->has('merchant_manager'))
                    <div class="invalid-feedback">
                        {{ $errors->first('merchant_manager') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantManagement.fields.merchant_manager_helper') }}</span>
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