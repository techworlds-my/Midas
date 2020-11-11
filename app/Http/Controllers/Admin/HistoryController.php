<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHistoryRequest;
use App\Http\Requests\StoreHistoryRequest;
use App\Http\Requests\UpdateHistoryRequest;
use App\Models\Gate;
use App\Models\History;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = History::with(['username', 'gate'])->select(sprintf('%s.*', (new History)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'history_show';
                $editGate      = 'history_edit';
                $deleteGate    = 'history_delete';
                $crudRoutePart = 'histories';

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

            $table->addColumn('gate_name', function ($row) {
                return $row->gate ? $row->gate->name : '';
            });

            $table->editColumn('qr', function ($row) {
                return $row->qr ? $row->qr : "";
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? $row->type : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'username', 'gate']);

            return $table->make(true);
        }

        return view('admin.histories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('history_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usernames = User::all()->pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gates = Gate::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.histories.create', compact('usernames', 'gates'));
    }

    public function store(StoreHistoryRequest $request)
    {
        $history = History::create($request->all());

        return redirect()->route('admin.histories.index');
    }

    public function edit(History $history)
    {
        abort_if(Gate::denies('history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usernames = User::all()->pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gates = Gate::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $history->load('username', 'gate');

        return view('admin.histories.edit', compact('usernames', 'gates', 'history'));
    }

    public function update(UpdateHistoryRequest $request, History $history)
    {
        $history->update($request->all());

        return redirect()->route('admin.histories.index');
    }

    public function show(History $history)
    {
        abort_if(Gate::denies('history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $history->load('username', 'gate');

        return view('admin.histories.show', compact('history'));
    }

    public function destroy(History $history)
    {
        abort_if(Gate::denies('history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $history->delete();

        return back();
    }

    public function massDestroy(MassDestroyHistoryRequest $request)
    {
        History::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
