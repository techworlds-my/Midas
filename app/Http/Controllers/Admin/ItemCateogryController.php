<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyItemCateogryRequest;
use App\Http\Requests\StoreItemCateogryRequest;
use App\Http\Requests\UpdateItemCateogryRequest;
use App\Models\ItemCateogry;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemCateogryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('item_cateogry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemCateogries = ItemCateogry::all();

        return view('admin.itemCateogries.index', compact('itemCateogries'));
    }

    public function create()
    {
        abort_if(Gate::denies('item_cateogry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.itemCateogries.create');
    }

    public function store(StoreItemCateogryRequest $request)
    {
        $itemCateogry = ItemCateogry::create($request->all());

        return redirect()->route('admin.item-cateogries.index');
    }

    public function edit(ItemCateogry $itemCateogry)
    {
        abort_if(Gate::denies('item_cateogry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.itemCateogries.edit', compact('itemCateogry'));
    }

    public function update(UpdateItemCateogryRequest $request, ItemCateogry $itemCateogry)
    {
        $itemCateogry->update($request->all());

        return redirect()->route('admin.item-cateogries.index');
    }

    public function show(ItemCateogry $itemCateogry)
    {
        abort_if(Gate::denies('item_cateogry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.itemCateogries.show', compact('itemCateogry'));
    }

    public function destroy(ItemCateogry $itemCateogry)
    {
        abort_if(Gate::denies('item_cateogry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemCateogry->delete();

        return back();
    }

    public function massDestroy(MassDestroyItemCateogryRequest $request)
    {
        ItemCateogry::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
