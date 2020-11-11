@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.memberCardSetting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.member-card-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.memberCardSetting.fields.id') }}
                        </th>
                        <td>
                            {{ $memberCardSetting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.memberCardSetting.fields.company') }}
                        </th>
                        <td>
                            {{ $memberCardSetting->company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.memberCardSetting.fields.card_image') }}
                        </th>
                        <td>
                            @if($memberCardSetting->card_image)
                                <a href="{{ $memberCardSetting->card_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $memberCardSetting->card_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.memberCardSetting.fields.format') }}
                        </th>
                        <td>
                            {{ $memberCardSetting->format }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.member-card-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection