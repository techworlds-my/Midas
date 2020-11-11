<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVehicleMangementRequest;
use App\Http\Requests\StoreVehicleMangementRequest;
use App\Http\Requests\UpdateVehicleMangementRequest;
use App\Models\User;
use App\Models\VehicleBrand;
use App\Models\VehicleMangement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VehicleMangementController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('vehicle_mangement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = VehicleMangement::with(['username', 'brand'])->select(sprintf('%s.*', (new VehicleMangement)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'vehicle_mangement_show';
                $editGate      = 'vehicle_mangement_edit';
                $deleteGate    = 'vehicle_mangement_delete';
                $crudRoutePart = 'vehicle-mangements';

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
            $table->addColumn('username_username', function ($row) {
                return $row->username ? $row->username->username : '';
            });

            $table->editColumn('car_plate', function ($row) {
                return $row->car_plate ? $row->car_plate : "";
            });
            $table->editColumn('is_verify', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_verify ? 'checked' : null) . '>';
            });
            $table->addColumn('brand_brand', function ($row) {
                return $row->brand ? $row->brand->brand : '';
            });

            $table->editColumn('model', function ($row) {
                return $row->model ? $row->model : "";
            });
            $table->editColumn('color', function ($row) {
                return $row->color ? $row->color : "";
            });
            $table->editColumn('is_season_park', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_season_park ? 'checked' : null) . '>';
            });
            $table->editColumn('driver_count', function ($row) {
                return $row->driver_count ? $row->driver_count : "";
            });
            $table->editColumn('is_resident', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_resident ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'username', 'is_verify', 'brand', 'is_season_park', 'is_resident']);

            return $table->make(true);
        }

        return view('admin.vehicleMangements.index');
    }

    public function create()
    {
        abort_if(Gate::denies('vehicle_mangement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usernames = User::all()->pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        $brands = VehicleBrand::all()->pluck('brand', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.vehicleMangements.create', compact('usernames', 'brands'));
    }

    public function store(StoreVehicleMangementRequest $request)
    {
        $vehicleMangement = VehicleMangement::create($request->all());

        return redirect()->route('admin.vehicle-mangements.index');
    }

    public function edit(VehicleMangement $vehicleMangement)
    {
        abort_if(Gate::denies('vehicle_mangement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usernames = User::all()->pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        $brands = VehicleBrand::all()->pluck('brand', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicleMangement->load('username', 'brand');

        return view('admin.vehicleMangements.edit', compact('usernames', 'brands', 'vehicleMangement'));
    }

    public function update(UpdateVehicleMangementRequest $request, VehicleMangement $vehicleMangement)
    {
        $vehicleMangement->update($request->all());

        return redirect()->route('admin.vehicle-mangements.index');
    }

    public function show(VehicleMangement $vehicleMangement)
    {
        abort_if(Gate::denies('vehicle_mangement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleMangement->load('username', 'brand');

        return view('admin.vehicleMangements.show', compact('vehicleMangement'));
    }

    public function destroy(VehicleMangement $vehicleMangement)
    {
        abort_if(Gate::denies('vehicle_mangement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleMangement->delete();

        return back();
    }

    public function massDestroy(MassDestroyVehicleMangementRequest $request)
    {
        VehicleMangement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
