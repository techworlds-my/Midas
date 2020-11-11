<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCarParkLocationRequest;
use App\Http\Requests\StoreCarParkLocationRequest;
use App\Http\Requests\UpdateCarParkLocationRequest;
use App\Models\CarParkLocation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CarParkLocationController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('car_park_location_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CarParkLocation::query()->select(sprintf('%s.*', (new CarParkLocation)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'car_park_location_show';
                $editGate      = 'car_park_location_edit';
                $deleteGate    = 'car_park_location_delete';
                $crudRoutePart = 'car-park-locations';

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
            $table->editColumn('location', function ($row) {
                return $row->location ? $row->location : "";
            });
            $table->editColumn('is_enable', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_enable ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'is_enable']);

            return $table->make(true);
        }

        return view('admin.carParkLocations.index');
    }

    public function create()
    {
        abort_if(Gate::denies('car_park_location_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carParkLocations.create');
    }

    public function store(StoreCarParkLocationRequest $request)
    {
        $carParkLocation = CarParkLocation::create($request->all());

        return redirect()->route('admin.car-park-locations.index');
    }

    public function edit(CarParkLocation $carParkLocation)
    {
        abort_if(Gate::denies('car_park_location_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carParkLocations.edit', compact('carParkLocation'));
    }

    public function update(UpdateCarParkLocationRequest $request, CarParkLocation $carParkLocation)
    {
        $carParkLocation->update($request->all());

        return redirect()->route('admin.car-park-locations.index');
    }

    public function show(CarParkLocation $carParkLocation)
    {
        abort_if(Gate::denies('car_park_location_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carParkLocations.show', compact('carParkLocation'));
    }

    public function destroy(CarParkLocation $carParkLocation)
    {
        abort_if(Gate::denies('car_park_location_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carParkLocation->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarParkLocationRequest $request)
    {
        CarParkLocation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
