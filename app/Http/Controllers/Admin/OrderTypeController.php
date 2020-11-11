<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderTypeRequest;
use App\Http\Requests\StoreOrderTypeRequest;
use App\Http\Requests\UpdateOrderTypeRequest;
use App\Models\OrderType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OrderTypeController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('order_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = OrderType::query()->select(sprintf('%s.*', (new OrderType)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'order_type_show';
                $editGate      = 'order_type_edit';
                $deleteGate    = 'order_type_delete';
                $crudRoutePart = 'order-types';

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
            $table->editColumn('type', function ($row) {
                return $row->type ? $row->type : "";
            });
            $table->editColumn('in_enable', function ($row) {
                return $row->in_enable ? $row->in_enable : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.orderTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('order_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.orderTypes.create');
    }

    public function store(StoreOrderTypeRequest $request)
    {
        $orderType = OrderType::create($request->all());

        return redirect()->route('admin.order-types.index');
    }

    public function edit(OrderType $orderType)
    {
        abort_if(Gate::denies('order_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.orderTypes.edit', compact('orderType'));
    }

    public function update(UpdateOrderTypeRequest $request, OrderType $orderType)
    {
        $orderType->update($request->all());

        return redirect()->route('admin.order-types.index');
    }

    public function show(OrderType $orderType)
    {
        abort_if(Gate::denies('order_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.orderTypes.show', compact('orderType'));
    }

    public function destroy(OrderType $orderType)
    {
        abort_if(Gate::denies('order_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderType->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderTypeRequest $request)
    {
        OrderType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
