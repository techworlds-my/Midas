<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVoucherWalletRequest;
use App\Http\Requests\StoreVoucherWalletRequest;
use App\Http\Requests\UpdateVoucherWalletRequest;
use App\Models\VoucherWallet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VoucherWalletController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('voucher_wallet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = VoucherWallet::query()->select(sprintf('%s.*', (new VoucherWallet)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'voucher_wallet_show';
                $editGate      = 'voucher_wallet_edit';
                $deleteGate    = 'voucher_wallet_delete';
                $crudRoutePart = 'voucher-wallets';

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
            $table->editColumn('is_redeem', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_redeem ? 'checked' : null) . '>';
            });
            $table->editColumn('usage', function ($row) {
                return $row->usage ? $row->usage : "";
            });
            $table->editColumn('username', function ($row) {
                return $row->username ? $row->username : "";
            });
            $table->editColumn('voucher', function ($row) {
                return $row->voucher ? $row->voucher : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'is_redeem']);

            return $table->make(true);
        }

        return view('admin.voucherWallets.index');
    }

    public function create()
    {
        abort_if(Gate::denies('voucher_wallet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.voucherWallets.create');
    }

    public function store(StoreVoucherWalletRequest $request)
    {
        $voucherWallet = VoucherWallet::create($request->all());

        return redirect()->route('admin.voucher-wallets.index');
    }

    public function edit(VoucherWallet $voucherWallet)
    {
        abort_if(Gate::denies('voucher_wallet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.voucherWallets.edit', compact('voucherWallet'));
    }

    public function update(UpdateVoucherWalletRequest $request, VoucherWallet $voucherWallet)
    {
        $voucherWallet->update($request->all());

        return redirect()->route('admin.voucher-wallets.index');
    }

    public function show(VoucherWallet $voucherWallet)
    {
        abort_if(Gate::denies('voucher_wallet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.voucherWallets.show', compact('voucherWallet'));
    }

    public function destroy(VoucherWallet $voucherWallet)
    {
        abort_if(Gate::denies('voucher_wallet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherWallet->delete();

        return back();
    }

    public function massDestroy(MassDestroyVoucherWalletRequest $request)
    {
        VoucherWallet::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
