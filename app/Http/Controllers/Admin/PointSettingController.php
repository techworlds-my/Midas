<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPointSettingRequest;
use App\Http\Requests\StorePointSettingRequest;
use App\Http\Requests\UpdatePointSettingRequest;
use App\Models\PointSetting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PointSettingController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('point_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PointSetting::query()->select(sprintf('%s.*', (new PointSetting)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'point_setting_show';
                $editGate      = 'point_setting_edit';
                $deleteGate    = 'point_setting_delete';
                $crudRoutePart = 'point-settings';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('point_ratio', function ($row) {
                return $row->point_ratio ? $row->point_ratio : "";
            });
            $table->editColumn('is_enable', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_enable ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'is_enable']);

            return $table->make(true);
        }

        return view('admin.pointSettings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('point_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pointSettings.create');
    }

    public function store(StorePointSettingRequest $request)
    {
        $pointSetting = PointSetting::create($request->all());

        return redirect()->route('admin.point-settings.index');
    }

    public function edit(PointSetting $pointSetting)
    {
        abort_if(Gate::denies('point_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pointSettings.edit', compact('pointSetting'));
    }

    public function update(UpdatePointSettingRequest $request, PointSetting $pointSetting)
    {
        $pointSetting->update($request->all());

        return redirect()->route('admin.point-settings.index');
    }

    public function show(PointSetting $pointSetting)
    {
        abort_if(Gate::denies('point_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pointSettings.show', compact('pointSetting'));
    }

    public function destroy(PointSetting $pointSetting)
    {
        abort_if(Gate::denies('point_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pointSetting->delete();

        return back();
    }

    public function massDestroy(MassDestroyPointSettingRequest $request)
    {
        PointSetting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
