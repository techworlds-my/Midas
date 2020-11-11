<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRewardManagementRequest;
use App\Http\Requests\StoreRewardManagementRequest;
use App\Http\Requests\UpdateRewardManagementRequest;
use App\Models\MerchantManagement;
use App\Models\RewardCatogery;
use App\Models\RewardManagement;
use App\Models\VoucherManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RewardManagementController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('reward_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RewardManagement::with(['merchant', 'category', 'voucher'])->select(sprintf('%s.*', (new RewardManagement)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'reward_management_show';
                $editGate      = 'reward_management_edit';
                $deleteGate    = 'reward_management_delete';
                $crudRoutePart = 'reward-managements';

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
            $table->addColumn('merchant_merchant', function ($row) {
                return $row->merchant ? $row->merchant->merchant : '';
            });

            $table->addColumn('category_category', function ($row) {
                return $row->category ? $row->category->category : '';
            });

            $table->editColumn('category.is_enable', function ($row) {
                return $row->category ? (is_string($row->category) ? $row->category : $row->category->is_enable) : '';
            });

            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : "";
            });
            $table->editColumn('top_up_amount', function ($row) {
                return $row->top_up_amount ? $row->top_up_amount : "";
            });
            $table->editColumn('purchase_amount', function ($row) {
                return $row->purchase_amount ? $row->purchase_amount : "";
            });
            $table->editColumn('referral_amount', function ($row) {
                return $row->referral_amount ? $row->referral_amount : "";
            });
            $table->editColumn('bonus', function ($row) {
                return $row->bonus ? $row->bonus : "";
            });
            $table->editColumn('point', function ($row) {
                return $row->point ? $row->point : "";
            });
            $table->addColumn('voucher_vouchercode', function ($row) {
                return $row->voucher ? $row->voucher->vouchercode : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'merchant', 'category', 'voucher']);

            return $table->make(true);
        }

        return view('admin.rewardManagements.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reward_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchants = MerchantManagement::all()->pluck('merchant', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = RewardCatogery::all()->pluck('category', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vouchers = VoucherManagement::all()->pluck('vouchercode', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.rewardManagements.create', compact('merchants', 'categories', 'vouchers'));
    }

    public function store(StoreRewardManagementRequest $request)
    {
        $rewardManagement = RewardManagement::create($request->all());

        return redirect()->route('admin.reward-managements.index');
    }

    public function edit(RewardManagement $rewardManagement)
    {
        abort_if(Gate::denies('reward_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchants = MerchantManagement::all()->pluck('merchant', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = RewardCatogery::all()->pluck('category', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vouchers = VoucherManagement::all()->pluck('vouchercode', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rewardManagement->load('merchant', 'category', 'voucher');

        return view('admin.rewardManagements.edit', compact('merchants', 'categories', 'vouchers', 'rewardManagement'));
    }

    public function update(UpdateRewardManagementRequest $request, RewardManagement $rewardManagement)
    {
        $rewardManagement->update($request->all());

        return redirect()->route('admin.reward-managements.index');
    }

    public function show(RewardManagement $rewardManagement)
    {
        abort_if(Gate::denies('reward_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rewardManagement->load('merchant', 'category', 'voucher');

        return view('admin.rewardManagements.show', compact('rewardManagement'));
    }

    public function destroy(RewardManagement $rewardManagement)
    {
        abort_if(Gate::denies('reward_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rewardManagement->delete();

        return back();
    }

    public function massDestroy(MassDestroyRewardManagementRequest $request)
    {
        RewardManagement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
