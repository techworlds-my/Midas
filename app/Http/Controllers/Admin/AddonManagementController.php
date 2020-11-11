<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAddonManagementRequest;
use App\Http\Requests\StoreAddonManagementRequest;
use App\Http\Requests\UpdateAddonManagementRequest;
use App\Models\AddOnCategory;
use App\Models\AddonManagement;
use App\Models\ItemManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddonManagementController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('addon_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addonManagements = AddonManagement::all();

        return view('admin.addonManagements.index', compact('addonManagements'));
    }

    public function create()
    {
        abort_if(Gate::denies('addon_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = AddOnCategory::all()->pluck('category', 'id')->prepend(trans('global.pleaseSelect'), '');

        $items = ItemManagement::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.addonManagements.create', compact('categories', 'items'));
    }

    public function store(StoreAddonManagementRequest $request)
    {
        $addonManagement = AddonManagement::create($request->all());

        return redirect()->route('admin.addon-managements.index');
    }

    public function edit(AddonManagement $addonManagement)
    {
        abort_if(Gate::denies('addon_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = AddOnCategory::all()->pluck('category', 'id')->prepend(trans('global.pleaseSelect'), '');

        $items = ItemManagement::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $addonManagement->load('category', 'item');

        return view('admin.addonManagements.edit', compact('categories', 'items', 'addonManagement'));
    }

    public function update(UpdateAddonManagementRequest $request, AddonManagement $addonManagement)
    {
        $addonManagement->update($request->all());

        return redirect()->route('admin.addon-managements.index');
    }

    public function show(AddonManagement $addonManagement)
    {
        abort_if(Gate::denies('addon_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addonManagement->load('category', 'item');

        return view('admin.addonManagements.show', compact('addonManagement'));
    }

    public function destroy(AddonManagement $addonManagement)
    {
        abort_if(Gate::denies('addon_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addonManagement->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddonManagementRequest $request)
    {
        AddonManagement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
