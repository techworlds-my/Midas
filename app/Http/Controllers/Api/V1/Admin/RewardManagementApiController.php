<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRewardManagementRequest;
use App\Http\Requests\UpdateRewardManagementRequest;
use App\Http\Resources\Admin\RewardManagementResource;
use App\Models\RewardManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RewardManagementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reward_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RewardManagementResource(RewardManagement::with(['merchant', 'category', 'voucher'])->get());
    }

    public function store(StoreRewardManagementRequest $request)
    {
        $rewardManagement = RewardManagement::create($request->all());

        return (new RewardManagementResource($rewardManagement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RewardManagement $rewardManagement)
    {
        abort_if(Gate::denies('reward_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RewardManagementResource($rewardManagement->load(['merchant', 'category', 'voucher']));
    }

    public function update(UpdateRewardManagementRequest $request, RewardManagement $rewardManagement)
    {
        $rewardManagement->update($request->all());

        return (new RewardManagementResource($rewardManagement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RewardManagement $rewardManagement)
    {
        abort_if(Gate::denies('reward_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rewardManagement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
