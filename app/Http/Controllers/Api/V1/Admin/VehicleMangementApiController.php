<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleMangementRequest;
use App\Http\Requests\UpdateVehicleMangementRequest;
use App\Http\Resources\Admin\VehicleMangementResource;
use App\Models\VehicleMangement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VehicleMangementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vehicle_mangement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicleMangementResource(VehicleMangement::with(['username', 'brand'])->get());
    }

    public function store(StoreVehicleMangementRequest $request)
    {
        $vehicleMangement = VehicleMangement::create($request->all());

        return (new VehicleMangementResource($vehicleMangement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(VehicleMangement $vehicleMangement)
    {
        abort_if(Gate::denies('vehicle_mangement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicleMangementResource($vehicleMangement->load(['username', 'brand']));
    }

    public function update(UpdateVehicleMangementRequest $request, VehicleMangement $vehicleMangement)
    {
        $vehicleMangement->update($request->all());

        return (new VehicleMangementResource($vehicleMangement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(VehicleMangement $vehicleMangement)
    {
        abort_if(Gate::denies('vehicle_mangement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleMangement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
