<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEventControlRequest;
use App\Http\Requests\StoreEventControlRequest;
use App\Http\Requests\UpdateEventControlRequest;
use App\Models\EventCategory;
use App\Models\EventControl;
use App\Models\Role;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EventControlController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('event_control_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = EventControl::with(['category', 'audience_groups'])->select(sprintf('%s.*', (new EventControl)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'event_control_show';
                $editGate      = 'event_control_edit';
                $deleteGate    = 'event_control_delete';
                $crudRoutePart = 'event-controls';

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
            $table->addColumn('category_cateogey', function ($row) {
                return $row->category ? $row->category->cateogey : '';
            });

            $table->editColumn('time', function ($row) {
                return $row->time ? $row->time : "";
            });
            $table->editColumn('audience_group', function ($row) {
                $labels = [];

                foreach ($row->audience_groups as $audience_group) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $audience_group->title);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('payment', function ($row) {
                return $row->payment ? $row->payment : "";
            });
            $table->editColumn('participants', function ($row) {
                return $row->participants ? $row->participants : "";
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'category', 'audience_group']);

            return $table->make(true);
        }

        return view('admin.eventControls.index');
    }

    public function create()
    {
        abort_if(Gate::denies('event_control_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = EventCategory::all()->pluck('cateogey', 'id')->prepend(trans('global.pleaseSelect'), '');

        $audience_groups = Role::all()->pluck('title', 'id');

        return view('admin.eventControls.create', compact('categories', 'audience_groups'));
    }

    public function store(StoreEventControlRequest $request)
    {
        $eventControl = EventControl::create($request->all());
        $eventControl->audience_groups()->sync($request->input('audience_groups', []));

        return redirect()->route('admin.event-controls.index');
    }

    public function edit(EventControl $eventControl)
    {
        abort_if(Gate::denies('event_control_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = EventCategory::all()->pluck('cateogey', 'id')->prepend(trans('global.pleaseSelect'), '');

        $audience_groups = Role::all()->pluck('title', 'id');

        $eventControl->load('category', 'audience_groups');

        return view('admin.eventControls.edit', compact('categories', 'audience_groups', 'eventControl'));
    }

    public function update(UpdateEventControlRequest $request, EventControl $eventControl)
    {
        $eventControl->update($request->all());
        $eventControl->audience_groups()->sync($request->input('audience_groups', []));

        return redirect()->route('admin.event-controls.index');
    }

    public function show(EventControl $eventControl)
    {
        abort_if(Gate::denies('event_control_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventControl->load('category', 'audience_groups');

        return view('admin.eventControls.show', compact('eventControl'));
    }

    public function destroy(EventControl $eventControl)
    {
        abort_if(Gate::denies('event_control_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventControl->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventControlRequest $request)
    {
        EventControl::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
