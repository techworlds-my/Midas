<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMerchantManagementRequest;
use App\Http\Requests\StoreMerchantManagementRequest;
use App\Http\Requests\UpdateMerchantManagementRequest;
use App\Models\MerchantCategory;
use App\Models\MerchantLevel;
use App\Models\MerchantManagement;
use App\Models\MerchantSubCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MerchantManagementController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('merchant_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MerchantManagement::with(['category', 'sub_cateogry', 'level', 'created_by'])->select(sprintf('%s.*', (new MerchantManagement)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'merchant_management_show';
                $editGate      = 'merchant_management_edit';
                $deleteGate    = 'merchant_management_delete';
                $crudRoutePart = 'merchant-managements';

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
            $table->editColumn('company_name', function ($row) {
                return $row->company_name ? $row->company_name : "";
            });
            $table->editColumn('ssm', function ($row) {
                return $row->ssm ? $row->ssm : "";
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : "";
            });
            $table->editColumn('postcode', function ($row) {
                return $row->postcode ? $row->postcode : "";
            });
            $table->editColumn('in_charge_person', function ($row) {
                return $row->in_charge_person ? $row->in_charge_person : "";
            });
            $table->editColumn('contact', function ($row) {
                return $row->contact ? $row->contact : "";
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : "";
            });
            $table->editColumn('position', function ($row) {
                return $row->position ? $row->position : "";
            });
            $table->addColumn('category_cateogry', function ($row) {
                return $row->category ? $row->category->cateogry : '';
            });

            $table->addColumn('sub_cateogry_sub_category', function ($row) {
                return $row->sub_cateogry ? $row->sub_cateogry->sub_category : '';
            });

            $table->editColumn('website', function ($row) {
                return $row->website ? $row->website : "";
            });
            $table->editColumn('facebook', function ($row) {
                return $row->facebook ? $row->facebook : "";
            });
            $table->editColumn('instagram', function ($row) {
                return $row->instagram ? $row->instagram : "";
            });
            $table->addColumn('level_level', function ($row) {
                return $row->level ? $row->level->level : '';
            });

            $table->editColumn('merchant', function ($row) {
                return $row->merchant ? $row->merchant : "";
            });
            $table->editColumn('merchant_admin', function ($row) {
                return $row->merchant_admin ? $row->merchant_admin : "";
            });
            $table->editColumn('merchant_manager', function ($row) {
                return $row->merchant_manager ? $row->merchant_manager : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'category', 'sub_cateogry', 'level']);

            return $table->make(true);
        }

        return view('admin.merchantManagements.index');
    }

    public function create()
    {
        abort_if(Gate::denies('merchant_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = MerchantCategory::all()->pluck('cateogry', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sub_cateogries = MerchantSubCategory::all()->pluck('sub_category', 'id')->prepend(trans('global.pleaseSelect'), '');

        $levels = MerchantLevel::all()->pluck('level', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.merchantManagements.create', compact('categories', 'sub_cateogries', 'levels'));
    }

    public function store(StoreMerchantManagementRequest $request)
    {
        $merchantManagement = MerchantManagement::create($request->all());

        return redirect()->route('admin.merchant-managements.index');
    }

    public function edit(MerchantManagement $merchantManagement)
    {
        abort_if(Gate::denies('merchant_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = MerchantCategory::all()->pluck('cateogry', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sub_cateogries = MerchantSubCategory::all()->pluck('sub_category', 'id')->prepend(trans('global.pleaseSelect'), '');

        $levels = MerchantLevel::all()->pluck('level', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchantManagement->load('category', 'sub_cateogry', 'level', 'created_by');

        return view('admin.merchantManagements.edit', compact('categories', 'sub_cateogries', 'levels', 'merchantManagement'));
    }

    public function update(UpdateMerchantManagementRequest $request, MerchantManagement $merchantManagement)
    {
        $merchantManagement->update($request->all());

        return redirect()->route('admin.merchant-managements.index');
    }

    public function show(MerchantManagement $merchantManagement)
    {
        abort_if(Gate::denies('merchant_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantManagement->load('category', 'sub_cateogry', 'level', 'created_by');

        return view('admin.merchantManagements.show', compact('merchantManagement'));
    }

    public function destroy(MerchantManagement $merchantManagement)
    {
        abort_if(Gate::denies('merchant_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantManagement->delete();

        return back();
    }

    public function massDestroy(MassDestroyMerchantManagementRequest $request)
    {
        MerchantManagement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
