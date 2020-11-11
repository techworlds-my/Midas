<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGateRequest;
use App\Http\Requests\StoreGateRequest;
use App\Http\Requests\UpdateGateRequest;
use App\Models\Gate;
use App\Models\Location;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class GateController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('gate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Gate::with(['location'])->select(sprintf('%s.*', (new Gate)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'gate_show';
                $editGate      = 'gate_edit';
                $deleteGate    = 'gate_delete';
                $crudRoutePart = 'gates';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('last_active', function ($row) {
                return $row->last_active ? $row->last_active : "";
            });
            $table->addColumn('location_location', function ($row) {
                return $row->location ? $row->location->location : '';
            });

            $table->editColumn('in_enable', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->in_enable ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'location', 'in_enable']);

            return $table->make(true);
        }

        return view('admin.gates.index');
    }

    public function create()
    {
        abort_if(Gate::denies('gate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $locations = Location::all()->pluck('location', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.gates.create', compact('locations'));
    }

    public function store(StoreGateRequest $request)
    {
        $gate = Gate::create($request->all());

        return redirect()->route('admin.gates.index');
    }

    public function edit(Gate $gate)
    {
        abort_if(Gate::denies('gate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $locations = Location::all()->pluck('location', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gate->load('location');

        return view('admin.gates.edit', compact('locations', 'gate'));
    }

    public function update(UpdateGateRequest $request, Gate $gate)
    {
        $gate->update($request->all());

        return redirect()->route('admin.gates.index');
    }

    public function show(Gate $gate)
    {
        abort_if(Gate::denies('gate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gate->load('location');

        return view('admin.gates.show', compact('gate'));
    }

    public function destroy(Gate $gate)
    {
        abort_if(Gate::denies('gate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gate->delete();

        return back();
    }

    public function massDestroy(MassDestroyGateRequest $request)
    {
        Gate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
