<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShopRentalRequest;
use App\Http\Requests\UpdateShopRentalRequest;
use App\Http\Resources\Admin\ShopRentalResource;
use App\Models\ShopRental;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShopRentalApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shop_rental_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ShopRentalResource(ShopRental::with(['merchant'])->get());
    }

    public function store(StoreShopRentalRequest $request)
    {
        $shopRental = ShopRental::create($request->all());

        return (new ShopRentalResource($shopRental))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ShopRental $shopRental)
    {
        abort_if(Gate::denies('shop_rental_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ShopRentalResource($shopRental->load(['merchant']));
    }

    public function update(UpdateShopRentalRequest $request, ShopRental $shopRental)
    {
        $shopRental->update($request->all());

        return (new ShopRentalResource($shopRental))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ShopRental $shopRental)
    {
        abort_if(Gate::denies('shop_rental_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shopRental->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
