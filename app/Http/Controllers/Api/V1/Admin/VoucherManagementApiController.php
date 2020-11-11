<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVoucherManagementRequest;
use App\Http\Requests\UpdateVoucherManagementRequest;
use App\Http\Resources\Admin\VoucherManagementResource;
use App\Models\VoucherManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VoucherManagementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('voucher_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VoucherManagementResource(VoucherManagement::with(['merchant', 'item_category', 'items'])->get());
    }

    public function store(StoreVoucherManagementRequest $request)
    {
        $voucherManagement = VoucherManagement::create($request->all());
        $voucherManagement->items()->sync($request->input('items', []));

        return (new VoucherManagementResource($voucherManagement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(VoucherManagement $voucherManagement)
    {
        abort_if(Gate::denies('voucher_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VoucherManagementResource($voucherManagement->load(['merchant', 'item_category', 'items']));
    }

    public function update(UpdateVoucherManagementRequest $request, VoucherManagement $voucherManagement)
    {
        $voucherManagement->update($request->all());
        $voucherManagement->items()->sync($request->input('items', []));

        return (new VoucherManagementResource($voucherManagement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(VoucherManagement $voucherManagement)
    {
        abort_if(Gate::denies('voucher_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherManagement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
