<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMerchantManagementRequest;
use App\Http\Requests\UpdateMerchantManagementRequest;
use App\Http\Resources\Admin\MerchantManagementResource;
use App\Models\MerchantManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MerchantManagementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('merchant_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MerchantManagementResource(MerchantManagement::with(['category', 'sub_cateogry', 'created_by', 'level'])->get());
    }

    public function store(StoreMerchantManagementRequest $request)
    {
        $merchantManagement = MerchantManagement::create($request->all());

        return (new MerchantManagementResource($merchantManagement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MerchantManagement $merchantManagement)
    {
        abort_if(Gate::denies('merchant_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MerchantManagementResource($merchantManagement->load(['category', 'sub_cateogry', 'created_by', 'level']));
    }

    public function update(UpdateMerchantManagementRequest $request, MerchantManagement $merchantManagement)
    {
        $merchantManagement->update($request->all());

        return (new MerchantManagementResource($merchantManagement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MerchantManagement $merchantManagement)
    {
        abort_if(Gate::denies('merchant_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantManagement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
