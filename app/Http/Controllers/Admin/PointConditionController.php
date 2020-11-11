<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPointConditionRequest;
use App\Http\Requests\StorePointConditionRequest;
use App\Http\Requests\UpdatePointConditionRequest;
use App\Models\PointCondition;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PointConditionController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('point_condition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PointCondition::query()->select(sprintf('%s.*', (new PointCondition)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'point_condition_show';
                $editGate      = 'point_condition_edit';
                $deleteGate    = 'point_condition_delete';
                $crudRoutePart = 'point-conditions';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : "";
            });
            $table->editColumn('is_enable', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_enable ? 'checked' : null) . '>';
            });
            $table->editColumn('point_add', function ($row) {
                return $row->point_add ? $row->point_add : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'is_enable']);

            return $table->make(true);
        }

        return view('admin.pointConditions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('point_condition_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pointConditions.create');
    }

    public function store(StorePointConditionRequest $request)
    {
        $pointCondition = PointCondition::create($request->all());

        return redirect()->route('admin.point-conditions.index');
    }

    public function edit(PointCondition $pointCondition)
    {
        abort_if(Gate::denies('point_condition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pointConditions.edit', compact('pointCondition'));
    }

    public function update(UpdatePointConditionRequest $request, PointCondition $pointCondition)
    {
        $pointCondition->update($request->all());

        return redirect()->route('admin.point-conditions.index');
    }

    public function show(PointCondition $pointCondition)
    {
        abort_if(Gate::denies('point_condition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pointConditions.show', compact('pointCondition'));
    }

    public function destroy(PointCondition $pointCondition)
    {
        abort_if(Gate::denies('point_condition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pointCondition->delete();

        return back();
    }

    public function massDestroy(MassDestroyPointConditionRequest $request)
    {
        PointCondition::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
