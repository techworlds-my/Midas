<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRewardListRequest;
use App\Http\Requests\UpdateRewardListRequest;
use App\Http\Resources\Admin\RewardListResource;
use App\Models\RewardList;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RewardListApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reward_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RewardListResource(RewardList::with(['username', 'reward'])->get());
    }

    public function store(StoreRewardListRequest $request)
    {
        $rewardList = RewardList::create($request->all());

        return (new RewardListResource($rewardList))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RewardList $rewardList)
    {
        abort_if(Gate::denies('reward_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RewardListResource($rewardList->load(['username', 'reward']));
    }

    public function update(UpdateRewardListRequest $request, RewardList $rewardList)
    {
        $rewardList->update($request->all());

        return (new RewardListResource($rewardList))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RewardList $rewardList)
    {
        abort_if(Gate::denies('reward_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rewardList->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
