<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRewardCatogeryRequest;
use App\Http\Requests\StoreRewardCatogeryRequest;
use App\Http\Requests\UpdateRewardCatogeryRequest;
use App\Models\RewardCatogery;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RewardCatogeryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('reward_catogery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RewardCatogery::query()->select(sprintf('%s.*', (new RewardCatogery)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'reward_catogery_show';
                $editGate      = 'reward_catogery_edit';
                $deleteGate    = 'reward_catogery_delete';
                $crudRoutePart = 'reward-catogeries';

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
            $table->editColumn('category', function ($row) {
                return $row->category ? $row->category : "";
            });
            $table->editColumn('is_enable', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_enable ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'is_enable']);

            return $table->make(true);
        }

        return view('admin.rewardCatogeries.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reward_catogery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rewardCatogeries.create');
    }

    public function store(StoreRewardCatogeryRequest $request)
    {
        $rewardCatogery = RewardCatogery::create($request->all());

        return redirect()->route('admin.reward-catogeries.index');
    }

    public function edit(RewardCatogery $rewardCatogery)
    {
        abort_if(Gate::denies('reward_catogery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rewardCatogeries.edit', compact('rewardCatogery'));
    }

    public function update(UpdateRewardCatogeryRequest $request, RewardCatogery $rewardCatogery)
    {
        $rewardCatogery->update($request->all());

        return redirect()->route('admin.reward-catogeries.index');
    }

    public function show(RewardCatogery $rewardCatogery)
    {
        abort_if(Gate::denies('reward_catogery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rewardCatogeries.show', compact('rewardCatogery'));
    }

    public function destroy(RewardCatogery $rewardCatogery)
    {
        abort_if(Gate::denies('reward_catogery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rewardCatogery->delete();

        return back();
    }

    public function massDestroy(MassDestroyRewardCatogeryRequest $request)
    {
        RewardCatogery::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
