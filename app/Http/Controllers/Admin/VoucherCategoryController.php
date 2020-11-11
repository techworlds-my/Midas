<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVoucherCategoryRequest;
use App\Http\Requests\StoreVoucherCategoryRequest;
use App\Http\Requests\UpdateVoucherCategoryRequest;
use App\Models\VoucherCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VoucherCategoryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('voucher_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = VoucherCategory::query()->select(sprintf('%s.*', (new VoucherCategory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'voucher_category_show';
                $editGate      = 'voucher_category_edit';
                $deleteGate    = 'voucher_category_delete';
                $crudRoutePart = 'voucher-categories';

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
            $table->editColumn('cateogry', function ($row) {
                return $row->cateogry ? $row->cateogry : "";
            });
            $table->editColumn('in_enable', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->in_enable ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'in_enable']);

            return $table->make(true);
        }

        return view('admin.voucherCategories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('voucher_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.voucherCategories.create');
    }

    public function store(StoreVoucherCategoryRequest $request)
    {
        $voucherCategory = VoucherCategory::create($request->all());

        return redirect()->route('admin.voucher-categories.index');
    }

    public function edit(VoucherCategory $voucherCategory)
    {
        abort_if(Gate::denies('voucher_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.voucherCategories.edit', compact('voucherCategory'));
    }

    public function update(UpdateVoucherCategoryRequest $request, VoucherCategory $voucherCategory)
    {
        $voucherCategory->update($request->all());

        return redirect()->route('admin.voucher-categories.index');
    }

    public function show(VoucherCategory $voucherCategory)
    {
        abort_if(Gate::denies('voucher_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.voucherCategories.show', compact('voucherCategory'));
    }

    public function destroy(VoucherCategory $voucherCategory)
    {
        abort_if(Gate::denies('voucher_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyVoucherCategoryRequest $request)
    {
        VoucherCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
