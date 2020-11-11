<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarParkLocationRequest;
use App\Http\Requests\UpdateCarParkLocationRequest;
use App\Http\Resources\Admin\CarParkLocationResource;
use App\Models\CarParkLocation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarParkLocationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('car_park_location_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CarParkLocationResource(CarParkLocation::all());
    }

    public function store(StoreCarParkLocationRequest $request)
    {
        $carParkLocation = CarParkLocation::create($request->all());

        return (new CarParkLocationResource($carParkLocation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CarParkLocation $carParkLocation)
    {
        abort_if(Gate::denies('car_park_location_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CarParkLocationResource($carParkLocation);
    }

    public function update(UpdateCarParkLocationRequest $request, CarParkLocation $carParkLocation)
    {
        $carParkLocation->update($request->all());

        return (new CarParkLocationResource($carParkLocation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CarParkLocation $carParkLocation)
    {
        abort_if(Gate::denies('car_park_location_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carParkLocation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
