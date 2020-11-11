@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.rewardCatogery.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reward-catogeries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rewardCatogery.fields.id') }}
                        </th>
                        <td>
                            {{ $rewardCatogery->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rewardCatogery.fields.category') }}
                        </th>
                        <td>
                            {{ $rewardCatogery->category }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rewardCatogery.fields.is_enable') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $rewardCatogery->is_enable ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reward-catogeries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection