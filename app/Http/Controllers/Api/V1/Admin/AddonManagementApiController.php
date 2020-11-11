<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddonManagementRequest;
use App\Http\Requests\UpdateAddonManagementRequest;
use App\Http\Resources\Admin\AddonManagementResource;
use App\Models\AddonManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddonManagementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('addon_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddonManagementResource(AddonManagement::with(['category', 'item'])->get());
    }

    public function store(StoreAddonManagementRequest $request)
    {
        $addonManagement = AddonManagement::create($request->all());

        return (new AddonManagementResource($addonManagement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddonManagement $addonManagement)
    {
        abort_if(Gate::denies('addon_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddonManagementResource($addonManagement->load(['category', 'item']));
    }

    public function update(UpdateAddonManagementRequest $request, AddonManagement $addonManagement)
    {
        $addonManagement->update($request->all());

        return (new AddonManagementResource($addonManagement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddonManagement $addonManagement)
    {
        abort_if(Gate::denies('addon_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addonManagement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
