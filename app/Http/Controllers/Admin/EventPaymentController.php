<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEventPaymentRequest;
use App\Http\Requests\StoreEventPaymentRequest;
use App\Http\Requests\UpdateEventPaymentRequest;
use App\Models\EventControl;
use App\Models\EventPayment;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EventPaymentController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('event_payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = EventPayment::with(['username', 'event'])->select(sprintf('%s.*', (new EventPayment)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'event_payment_show';
                $editGate      = 'event_payment_edit';
                $deleteGate    = 'event_payment_delete';
                $crudRoutePart = 'event-payments';

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
            $table->addColumn('username_name', function ($row) {
                return $row->username ? $row->username->name : '';
            });

            $table->editColumn('username.username', function ($row) {
                return $row->username ? (is_string($row->username) ? $row->username : $row->username->username) : '';
            });
            $table->addColumn('event_title', function ($row) {
                return $row->event ? $row->event->title : '';
            });

            $table->editColumn('payment', function ($row) {
                return $row->payment ? $row->payment : "";
            });
            $table->editColumn('payment_method', function ($row) {
                return $row->payment_method ? $row->payment_method : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'username', 'event']);

            return $table->make(true);
        }

        return view('admin.eventPayments.index');
    }

    public function create()
    {
        abort_if(Gate::denies('event_payment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usernames = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $events = EventControl::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.eventPayments.create', compact('usernames', 'events'));
    }

    public function store(StoreEventPaymentRequest $request)
    {
        $eventPayment = EventPayment::create($request->all());

        return redirect()->route('admin.event-payments.index');
    }

    public function edit(EventPayment $eventPayment)
    {
        abort_if(Gate::denies('event_payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usernames = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $events = EventControl::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $eventPayment->load('username', 'event');

        return view('admin.eventPayments.edit', compact('usernames', 'events', 'eventPayment'));
    }

    public function update(UpdateEventPaymentRequest $request, EventPayment $eventPayment)
    {
        $eventPayment->update($request->all());

        return redirect()->route('admin.event-payments.index');
    }

    public function show(EventPayment $eventPayment)
    {
        abort_if(Gate::denies('event_payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventPayment->load('username', 'event');

        return view('admin.eventPayments.show', compact('eventPayment'));
    }

    public function destroy(EventPayment $eventPayment)
    {
        abort_if(Gate::denies('event_payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventPayment->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventPaymentRequest $request)
    {
        EventPayment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
