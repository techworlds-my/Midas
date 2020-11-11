<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePointSettingRequest;
use App\Http\Requests\UpdatePointSettingRequest;
use App\Http\Resources\Admin\PointSettingResource;
use App\Models\PointSetting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PointSettingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('point_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PointSettingResource(PointSetting::all());
    }

    public function store(StorePointSettingRequest $request)
    {
        $pointSetting = PointSetting::create($request->all());

        return (new PointSettingResource($pointSetting))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PointSetting $pointSetting)
    {
        abort_if(Gate::denies('point_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PointSettingResource($pointSetting);
    }

    public function update(UpdatePointSettingRequest $request, PointSetting $pointSetting)
    {
        $pointSetting->update($request->all());

        return (new PointSettingResource($pointSetting))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PointSetting $pointSetting)
    {
        abort_if(Gate::denies('point_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pointSetting->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
