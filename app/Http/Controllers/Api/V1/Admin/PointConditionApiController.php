<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePointConditionRequest;
use App\Http\Requests\UpdatePointConditionRequest;
use App\Http\Resources\Admin\PointConditionResource;
use App\Models\PointCondition;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PointConditionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('point_condition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PointConditionResource(PointCondition::all());
    }

    public function store(StorePointConditionRequest $request)
    {
        $pointCondition = PointCondition::create($request->all());

        return (new PointConditionResource($pointCondition))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PointCondition $pointCondition)
    {
        abort_if(Gate::denies('point_condition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PointConditionResource($pointCondition);
    }

    public function update(UpdatePointConditionRequest $request, PointCondition $pointCondition)
    {
        $pointCondition->update($request->all());

        return (new PointConditionResource($pointCondition))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PointCondition $pointCondition)
    {
        abort_if(Gate::denies('point_condition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pointCondition->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
