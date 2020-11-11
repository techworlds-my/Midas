<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMembeCardManagementRequest;
use App\Http\Requests\UpdateMembeCardManagementRequest;
use App\Http\Resources\Admin\MembeCardManagementResource;
use App\Models\MembeCardManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MembeCardManagementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('membe_card_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MembeCardManagementResource(MembeCardManagement::with(['user_name'])->get());
    }

    public function store(StoreMembeCardManagementRequest $request)
    {
        $membeCardManagement = MembeCardManagement::create($request->all());

        return (new MembeCardManagementResource($membeCardManagement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MembeCardManagement $membeCardManagement)
    {
        abort_if(Gate::denies('membe_card_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MembeCardManagementResource($membeCardManagement->load(['user_name']));
    }

    public function update(UpdateMembeCardManagementRequest $request, MembeCardManagement $membeCardManagement)
    {
        $membeCardManagement->update($request->all());

        return (new MembeCardManagementResource($membeCardManagement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MembeCardManagement $membeCardManagement)
    {
        abort_if(Gate::denies('membe_card_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $membeCardManagement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
