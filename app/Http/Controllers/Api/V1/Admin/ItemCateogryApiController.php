<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemCateogryRequest;
use App\Http\Requests\UpdateItemCateogryRequest;
use App\Http\Resources\Admin\ItemCateogryResource;
use App\Models\ItemCateogry;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemCateogryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('item_cateogry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemCateogryResource(ItemCateogry::all());
    }

    public function store(StoreItemCateogryRequest $request)
    {
        $itemCateogry = ItemCateogry::create($request->all());

        return (new ItemCateogryResource($itemCateogry))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ItemCateogry $itemCateogry)
    {
        abort_if(Gate::denies('item_cateogry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemCateogryResource($itemCateogry);
    }

    public function update(UpdateItemCateogryRequest $request, ItemCateogry $itemCateogry)
    {
        $itemCateogry->update($request->all());

        return (new ItemCateogryResource($itemCateogry))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ItemCateogry $itemCateogry)
    {
        abort_if(Gate::denies('item_cateogry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemCateogry->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
