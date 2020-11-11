<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMallUnitRequest;
use App\Http\Requests\UpdateMallUnitRequest;
use App\Http\Resources\Admin\MallUnitResource;
use App\Models\MallUnit;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MallUnitApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mall_unit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MallUnitResource(MallUnit::with(['merchant'])->get());
    }

    public function store(StoreMallUnitRequest $request)
    {
        $mallUnit = MallUnit::create($request->all());

        return (new MallUnitResource($mallUnit))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MallUnit $mallUnit)
    {
        abort_if(Gate::denies('mall_unit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MallUnitResource($mallUnit->load(['merchant']));
    }

    public function update(UpdateMallUnitRequest $request, MallUnit $mallUnit)
    {
        $mallUnit->update($request->all());

        return (new MallUnitResource($mallUnit))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MallUnit $mallUnit)
    {
        abort_if(Gate::denies('mall_unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mallUnit->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
