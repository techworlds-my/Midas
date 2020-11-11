<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRewardCatogeryRequest;
use App\Http\Requests\UpdateRewardCatogeryRequest;
use App\Http\Resources\Admin\RewardCatogeryResource;
use App\Models\RewardCatogery;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RewardCatogeryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reward_catogery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RewardCatogeryResource(RewardCatogery::all());
    }

    public function store(StoreRewardCatogeryRequest $request)
    {
        $rewardCatogery = RewardCatogery::create($request->all());

        return (new RewardCatogeryResource($rewardCatogery))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RewardCatogery $rewardCatogery)
    {
        abort_if(Gate::denies('reward_catogery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RewardCatogeryResource($rewardCatogery);
    }

    public function update(UpdateRewardCatogeryRequest $request, RewardCatogery $rewardCatogery)
    {
        $rewardCatogery->update($request->all());

        return (new RewardCatogeryResource($rewardCatogery))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RewardCatogery $rewardCatogery)
    {
        abort_if(Gate::denies('reward_catogery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rewardCatogery->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
