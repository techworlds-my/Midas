<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRewardListRequest;
use App\Http\Requests\StoreRewardListRequest;
use App\Http\Requests\UpdateRewardListRequest;
use App\Models\RewardList;
use App\Models\RewardManagement;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RewardListController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('reward_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RewardList::with(['username', 'reward'])->select(sprintf('%s.*', (new RewardList)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'reward_list_show';
                $editGate      = 'reward_list_edit';
                $deleteGate    = 'reward_list_delete';
                $crudRoutePart = 'reward-lists';

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

            $table->addColumn('reward_title', function ($row) {
                return $row->reward ? $row->reward->title : '';
            });

            $table->editColumn('reward_type', function ($row) {
                return $row->reward_type ? $row->reward_type : "";
            });
            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'username', 'reward']);

            return $table->make(true);
        }

        return view('admin.rewardLists.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reward_list_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usernames = User::all()->pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rewards = RewardManagement::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.rewardLists.create', compact('usernames', 'rewards'));
    }

    public function store(StoreRewardListRequest $request)
    {
        $rewardList = RewardList::create($request->all());

        return redirect()->route('admin.reward-lists.index');
    }

    public function edit(RewardList $rewardList)
    {
        abort_if(Gate::denies('reward_list_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usernames = User::all()->pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rewards = RewardManagement::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rewardList->load('username', 'reward');

        return view('admin.rewardLists.edit', compact('usernames', 'rewards', 'rewardList'));
    }

    public function update(UpdateRewardListRequest $request, RewardList $rewardList)
    {
        $rewardList->update($request->all());

        return redirect()->route('admin.reward-lists.index');
    }

    public function show(RewardList $rewardList)
    {
        abort_if(Gate::denies('reward_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rewardList->load('username', 'reward');

        return view('admin.rewardLists.show', compact('rewardList'));
    }

    public function destroy(RewardList $rewardList)
    {
        abort_if(Gate::denies('reward_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rewardList->delete();

        return back();
    }

    public function massDestroy(MassDestroyRewardListRequest $request)
    {
        RewardList::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
