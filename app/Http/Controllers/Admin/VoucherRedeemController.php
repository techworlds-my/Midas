<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVoucherRedeemRequest;
use App\Http\Requests\StoreVoucherRedeemRequest;
use App\Http\Requests\UpdateVoucherRedeemRequest;
use App\Models\VoucherManagement;
use App\Models\VoucherRedeem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VoucherRedeemController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('voucher_redeem_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = VoucherRedeem::with(['vouchercode'])->select(sprintf('%s.*', (new VoucherRedeem)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'voucher_redeem_show';
                $editGate      = 'voucher_redeem_edit';
                $deleteGate    = 'voucher_redeem_delete';
                $crudRoutePart = 'voucher-redeems';

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
            $table->addColumn('vouchercode_vouchercode', function ($row) {
                return $row->vouchercode ? $row->vouchercode->vouchercode : '';
            });

            $table->editColumn('username', function ($row) {
                return $row->username ? $row->username : "";
            });
            $table->editColumn('merchant', function ($row) {
                return $row->merchant ? $row->merchant : "";
            });
            $table->editColumn('date', function ($row) {
                return $row->date ? $row->date : "";
            });
            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : "";
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? $row->type : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'vouchercode']);

            return $table->make(true);
        }

        return view('admin.voucherRedeems.index');
    }

    public function create()
    {
        abort_if(Gate::denies('voucher_redeem_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vouchercodes = VoucherManagement::all()->pluck('vouchercode', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.voucherRedeems.create', compact('vouchercodes'));
    }

    public function store(StoreVoucherRedeemRequest $request)
    {
        $voucherRedeem = VoucherRedeem::create($request->all());

        return redirect()->route('admin.voucher-redeems.index');
    }

    public function edit(VoucherRedeem $voucherRedeem)
    {
        abort_if(Gate::denies('voucher_redeem_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vouchercodes = VoucherManagement::all()->pluck('vouchercode', 'id')->prepend(trans('global.pleaseSelect'), '');

        $voucherRedeem->load('vouchercode');

        return view('admin.voucherRedeems.edit', compact('vouchercodes', 'voucherRedeem'));
    }

    public function update(UpdateVoucherRedeemRequest $request, VoucherRedeem $voucherRedeem)
    {
        $voucherRedeem->update($request->all());

        return redirect()->route('admin.voucher-redeems.index');
    }

    public function show(VoucherRedeem $voucherRedeem)
    {
        abort_if(Gate::denies('voucher_redeem_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherRedeem->load('vouchercode');

        return view('admin.voucherRedeems.show', compact('voucherRedeem'));
    }

    public function destroy(VoucherRedeem $voucherRedeem)
    {
        abort_if(Gate::denies('voucher_redeem_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherRedeem->delete();

        return back();
    }

    public function massDestroy(MassDestroyVoucherRedeemRequest $request)
    {
        VoucherRedeem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
