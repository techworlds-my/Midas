<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderManagementRequest;
use App\Http\Requests\StoreOrderManagementRequest;
use App\Http\Requests\UpdateOrderManagementRequest;
use App\Models\OrderManagement;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OrderManagementController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('order_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = OrderManagement::with(['status', 'username', 'paymentmethod'])->select(sprintf('%s.*', (new OrderManagement)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'order_management_show';
                $editGate      = 'order_management_edit';
                $deleteGate    = 'order_management_delete';
                $crudRoutePart = 'order-managements';

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
            $table->editColumn('order', function ($row) {
                return $row->order ? $row->order : "";
            });
            $table->addColumn('status_status', function ($row) {
                return $row->status ? $row->status->status : '';
            });

            $table->editColumn('status.in_enable', function ($row) {
                return $row->status ? (is_string($row->status) ? $row->status : $row->status->in_enable) : '';
            });
            $table->addColumn('username_username', function ($row) {
                return $row->username ? $row->username->username : '';
            });

            $table->editColumn('voucher', function ($row) {
                return $row->voucher ? $row->voucher : "";
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : "";
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : "";
            });
            $table->editColumn('delivery_charge', function ($row) {
                return $row->delivery_charge ? $row->delivery_charge : "";
            });
            $table->editColumn('tax', function ($row) {
                return $row->tax ? $row->tax : "";
            });
            $table->editColumn('total', function ($row) {
                return $row->total ? $row->total : "";
            });
            $table->addColumn('paymentmethod_method', function ($row) {
                return $row->paymentmethod ? $row->paymentmethod->method : '';
            });

            $table->editColumn('paymentmethod.in_enable', function ($row) {
                return $row->paymentmethod ? (is_string($row->paymentmethod) ? $row->paymentmethod : $row->paymentmethod->in_enable) : '';
            });
            $table->editColumn('comment', function ($row) {
                return $row->comment ? $row->comment : "";
            });
            $table->editColumn('merchant', function ($row) {
                return $row->merchant ? $row->merchant : "";
            });
            $table->editColumn('transaction', function ($row) {
                return $row->transaction ? $row->transaction : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'status', 'username', 'paymentmethod']);

            return $table->make(true);
        }

        return view('admin.orderManagements.index');
    }

    public function create()
    {
        abort_if(Gate::denies('order_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = OrderStatus::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $usernames = User::all()->pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        $paymentmethods = PaymentMethod::all()->pluck('method', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.orderManagements.create', compact('statuses', 'usernames', 'paymentmethods'));
    }

    public function store(StoreOrderManagementRequest $request)
    {
        $orderManagement = OrderManagement::create($request->all());

        return redirect()->route('admin.order-managements.index');
    }

    public function edit(OrderManagement $orderManagement)
    {
        abort_if(Gate::denies('order_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = OrderStatus::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $usernames = User::all()->pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        $paymentmethods = PaymentMethod::all()->pluck('method', 'id')->prepend(trans('global.pleaseSelect'), '');

        $orderManagement->load('status', 'username', 'paymentmethod');

        return view('admin.orderManagements.edit', compact('statuses', 'usernames', 'paymentmethods', 'orderManagement'));
    }

    public function update(UpdateOrderManagementRequest $request, OrderManagement $orderManagement)
    {
        $orderManagement->update($request->all());

        return redirect()->route('admin.order-managements.index');
    }

    public function show(OrderManagement $orderManagement)
    {
        abort_if(Gate::denies('order_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderManagement->load('status', 'username', 'paymentmethod');

        return view('admin.orderManagements.show', compact('orderManagement'));
    }

    public function destroy(OrderManagement $orderManagement)
    {
        abort_if(Gate::denies('order_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderManagement->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderManagementRequest $request)
    {
        OrderManagement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
