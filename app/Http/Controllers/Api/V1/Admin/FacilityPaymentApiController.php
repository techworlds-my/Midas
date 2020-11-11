<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreFacilityPaymentRequest;
use App\Http\Requests\UpdateFacilityPaymentRequest;
use App\Http\Resources\Admin\FacilityPaymentResource;
use App\Models\FacilityPayment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FacilityPaymentApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('facility_payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FacilityPaymentResource(FacilityPayment::with(['facility', 'username', 'payment_method'])->get());
    }

    public function store(StoreFacilityPaymentRequest $request)
    {
        $facilityPayment = FacilityPayment::create($request->all());

        if ($request->input('reciept', false)) {
            $facilityPayment->addMedia(storage_path('tmp/uploads/' . $request->input('reciept')))->toMediaCollection('reciept');
        }

        return (new FacilityPaymentResource($facilityPayment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(FacilityPayment $facilityPayment)
    {
        abort_if(Gate::denies('facility_payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FacilityPaymentResource($facilityPayment->load(['facility', 'username', 'payment_method']));
    }

    public function update(UpdateFacilityPaymentRequest $request, FacilityPayment $facilityPayment)
    {
        $facilityPayment->update($request->all());

        if ($request->input('reciept', false)) {
            if (!$facilityPayment->reciept || $request->input('reciept') !== $facilityPayment->reciept->file_name) {
                if ($facilityPayment->reciept) {
                    $facilityPayment->reciept->delete();
                }

                $facilityPayment->addMedia(storage_path('tmp/uploads/' . $request->input('reciept')))->toMediaCollection('reciept');
            }
        } elseif ($facilityPayment->reciept) {
            $facilityPayment->reciept->delete();
        }

        return (new FacilityPaymentResource($facilityPayment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(FacilityPayment $facilityPayment)
    {
        abort_if(Gate::denies('facility_payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facilityPayment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
