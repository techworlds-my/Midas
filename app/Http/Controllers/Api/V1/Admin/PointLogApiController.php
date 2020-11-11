<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePointLogRequest;
use App\Http\Requests\UpdatePointLogRequest;
use App\Http\Resources\Admin\PointLogResource;
use App\Models\PointLog;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PointLogApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('point_log_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PointLogResource(PointLog::with(['username', 'title'])->get());
    }

    public function store(StorePointLogRequest $request)
    {
        $pointLog = PointLog::create($request->all());

        return (new PointLogResource($pointLog))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PointLog $pointLog)
    {
        abort_if(Gate::denies('point_log_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PointLogResource($pointLog->load(['username', 'title']));
    }

    public function update(UpdatePointLogRequest $request, PointLog $pointLog)
    {
        $pointLog->update($request->all());

        return (new PointLogResource($pointLog))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PointLog $pointLog)
    {
        abort_if(Gate::denies('point_log_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pointLog->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
