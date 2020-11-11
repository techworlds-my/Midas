@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.rewardList.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reward-lists.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rewardList.fields.id') }}
                        </th>
                        <td>
                            {{ $rewardList->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rewardList.fields.username') }}
                        </th>
                        <td>
                            {{ $rewardList->username->username ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rewardList.fields.reward') }}
                        </th>
                        <td>
                            {{ $rewardList->reward->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rewardList.fields.reward_type') }}
                        </th>
                        <td>
                            {{ $rewardList->reward_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rewardList.fields.amount') }}
                        </th>
                        <td>
                            {{ $rewardList->amount }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reward-lists.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection