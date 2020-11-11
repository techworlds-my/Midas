@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.membeCardManagement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.membe-card-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.membeCardManagement.fields.id') }}
                        </th>
                        <td>
                            {{ $membeCardManagement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.membeCardManagement.fields.company') }}
                        </th>
                        <td>
                            {{ $membeCardManagement->company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.membeCardManagement.fields.card_no') }}
                        </th>
                        <td>
                            {{ $membeCardManagement->card_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.membeCardManagement.fields.user_name') }}
                        </th>
                        <td>
                            {{ $membeCardManagement->user_name->username ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.membe-card-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection