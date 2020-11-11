<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGateRequest;
use App\Http\Requests\UpdateGateRequest;
use App\Http\Resources\Admin\GateResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GateApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GateResource(Gate::with(['location'])->get());
    }

    public function store(StoreGateRequest $request)
    {
        $gate = Gate::create($request->all());

        return (new GateResource($gate))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Gate $gate)
    {
        abort_if(Gate::denies('gate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GateResource($gate->load(['location']));
    }

    public function update(UpdateGateRequest $request, Gate $gate)
    {
        $gate->update($request->all());

        return (new GateResource($gate))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Gate $gate)
    {
        abort_if(Gate::denies('gate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gate->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
