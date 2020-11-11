<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVoucherRedeemRequest;
use App\Http\Requests\UpdateVoucherRedeemRequest;
use App\Http\Resources\Admin\VoucherRedeemResource;
use App\Models\VoucherRedeem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VoucherRedeemApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('voucher_redeem_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VoucherRedeemResource(VoucherRedeem::with(['vouchercode'])->get());
    }

    public function store(StoreVoucherRedeemRequest $request)
    {
        $voucherRedeem = VoucherRedeem::create($request->all());

        return (new VoucherRedeemResource($voucherRedeem))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(VoucherRedeem $voucherRedeem)
    {
        abort_if(Gate::denies('voucher_redeem_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VoucherRedeemResource($voucherRedeem->load(['vouchercode']));
    }

    public function update(UpdateVoucherRedeemRequest $request, VoucherRedeem $voucherRedeem)
    {
        $voucherRedeem->update($request->all());

        return (new VoucherRedeemResource($voucherRedeem))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(VoucherRedeem $voucherRedeem)
    {
        abort_if(Gate::denies('voucher_redeem_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherRedeem->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
