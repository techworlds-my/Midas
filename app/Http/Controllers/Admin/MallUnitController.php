<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMallUnitRequest;
use App\Http\Requests\StoreMallUnitRequest;
use App\Http\Requests\UpdateMallUnitRequest;
use App\Models\MallUnit;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MallUnitController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('mall_unit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MallUnit::query()->select(sprintf('%s.*', (new MallUnit)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'mall_unit_show';
                $editGate      = 'mall_unit_edit';
                $deleteGate    = 'mall_unit_delete';
                $crudRoutePart = 'mall-units';

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
            $table->editColumn('unit_no', function ($row) {
                return $row->unit_no ? $row->unit_no : "";
            });
            $table->editColumn('floor', function ($row) {
                return $row->floor ? $row->floor : "";
            });
            $table->editColumn('size', function ($row) {
                return $row->size ? $row->size : "";
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : "";
            });
            $table->editColumn('rental', function ($row) {
                return $row->rental ? $row->rental : "";
            });
            $table->editColumn('merchant', function ($row) {
                return $row->merchant ? $row->merchant : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.mallUnits.index');
    }

    public function create()
    {
        abort_if(Gate::denies('mall_unit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mallUnits.create');
    }

    public function store(StoreMallUnitRequest $request)
    {
        $mallUnit = MallUnit::create($request->all());

        return redirect()->route('admin.mall-units.index');
    }

    public function edit(MallUnit $mallUnit)
    {
        abort_if(Gate::denies('mall_unit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mallUnits.edit', compact('mallUnit'));
    }

    public function update(UpdateMallUnitRequest $request, MallUnit $mallUnit)
    {
        $mallUnit->update($request->all());

        return redirect()->route('admin.mall-units.index');
    }

    public function show(MallUnit $mallUnit)
    {
        abort_if(Gate::denies('mall_unit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mallUnits.show', compact('mallUnit'));
    }

    public function destroy(MallUnit $mallUnit)
    {
        abort_if(Gate::denies('mall_unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mallUnit->delete();

        return back();
    }

    public function massDestroy(MassDestroyMallUnitRequest $request)
    {
        MallUnit::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
