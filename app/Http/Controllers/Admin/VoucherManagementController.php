<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVoucherManagementRequest;
use App\Http\Requests\StoreVoucherManagementRequest;
use App\Http\Requests\UpdateVoucherManagementRequest;
use App\Models\ItemCateogry;
use App\Models\ItemManagement;
use App\Models\MerchantManagement;
use App\Models\VoucherManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VoucherManagementController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('voucher_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = VoucherManagement::with(['merchant', 'item_category', 'items'])->select(sprintf('%s.*', (new VoucherManagement)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'voucher_management_show';
                $editGate      = 'voucher_management_edit';
                $deleteGate    = 'voucher_management_delete';
                $crudRoutePart = 'voucher-managements';

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

            $table->editColumn('vouchercode', function ($row) {
                return $row->vouchercode ? $row->vouchercode : "";
            });
            $table->editColumn('discount_type', function ($row) {
                return $row->discount_type ? VoucherManagement::DISCOUNT_TYPE_SELECT[$row->discount_type] : '';
            });
            $table->editColumn('value', function ($row) {
                return $row->value ? $row->value : "";
            });
            $table->editColumn('min_spend', function ($row) {
                return $row->min_spend ? $row->min_spend : "";
            });
            $table->editColumn('max_spend', function ($row) {
                return $row->max_spend ? $row->max_spend : "";
            });
            $table->editColumn('excluded_sales_item', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->excluded_sales_item ? 'checked' : null) . '>';
            });
            $table->addColumn('item_category_category', function ($row) {
                return $row->item_category ? $row->item_category->category : '';
            });

            $table->editColumn('item_category.in_enable', function ($row) {
                return $row->item_category ? (is_string($row->item_category) ? $row->item_category : $row->item_category->in_enable) : '';
            });
            $table->editColumn('item', function ($row) {
                $labels = [];

                foreach ($row->items as $item) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $item->title);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('usage_limit', function ($row) {
                return $row->usage_limit ? $row->usage_limit : "";
            });
            $table->editColumn('limit_item', function ($row) {
                return $row->limit_item ? $row->limit_item : "";
            });
            $table->editColumn('limit_per_user', function ($row) {
                return $row->limit_per_user ? $row->limit_per_user : "";
            });

            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : "";
            });
            $table->editColumn('is_free_shipping', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_free_shipping ? 'checked' : null) . '>';
            });
            $table->editColumn('is_credit_purchase', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_credit_purchase ? 'checked' : null) . '>';
            });
            $table->editColumn('redeem_point', function ($row) {
                return $row->redeem_point ? $row->redeem_point : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'merchant', 'excluded_sales_item', 'item_category', 'item', 'is_free_shipping', 'is_credit_purchase']);

            return $table->make(true);
        }

        return view('admin.voucherManagements.index');
    }

    public function create()
    {
        abort_if(Gate::denies('voucher_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchants = MerchantManagement::all()->pluck('merchant', 'id')->prepend(trans('global.pleaseSelect'), '');

        $item_categories = ItemCateogry::all()->pluck('category', 'id')->prepend(trans('global.pleaseSelect'), '');

        $items = ItemManagement::all()->pluck('title', 'id');

        return view('admin.voucherManagements.create', compact('merchants', 'item_categories', 'items'));
    }

    public function store(StoreVoucherManagementRequest $request)
    {
        $voucherManagement = VoucherManagement::create($request->all());
        $voucherManagement->items()->sync($request->input('items', []));

        return redirect()->route('admin.voucher-managements.index');
    }

    public function edit(VoucherManagement $voucherManagement)
    {
        abort_if(Gate::denies('voucher_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchants = MerchantManagement::all()->pluck('merchant', 'id')->prepend(trans('global.pleaseSelect'), '');

        $item_categories = ItemCateogry::all()->pluck('category', 'id')->prepend(trans('global.pleaseSelect'), '');

        $items = ItemManagement::all()->pluck('title', 'id');

        $voucherManagement->load('merchant', 'item_category', 'items');

        return view('admin.voucherManagements.edit', compact('merchants', 'item_categories', 'items', 'voucherManagement'));
    }

    public function update(UpdateVoucherManagementRequest $request, VoucherManagement $voucherManagement)
    {
        $voucherManagement->update($request->all());
        $voucherManagement->items()->sync($request->input('items', []));

        return redirect()->route('admin.voucher-managements.index');
    }

    public function show(VoucherManagement $voucherManagement)
    {
        abort_if(Gate::denies('voucher_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherManagement->load('merchant', 'item_category', 'items');

        return view('admin.voucherManagements.show', compact('voucherManagement'));
    }

    public function destroy(VoucherManagement $voucherManagement)
    {
        abort_if(Gate::denies('voucher_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherManagement->delete();

        return back();
    }

    public function massDestroy(MassDestroyVoucherManagementRequest $request)
    {
        VoucherManagement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
