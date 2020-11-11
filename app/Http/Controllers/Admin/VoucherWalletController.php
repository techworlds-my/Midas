<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVoucherWalletRequest;
use App\Http\Requests\StoreVoucherWalletRequest;
use App\Http\Requests\UpdateVoucherWalletRequest;
use App\Models\User;
use App\Models\VoucherManagement;
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
            $query = VoucherWallet::with(['username', 'voucher'])->select(sprintf('%s.*', (new VoucherWallet)->table));
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
            $table->addColumn('username_username', function ($row) {
                return $row->username ? $row->username->username : '';
            });

            $table->editColumn('is_redeem', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_redeem ? 'checked' : null) . '>';
            });
            $table->addColumn('voucher_vouchercode', function ($row) {
                return $row->voucher ? $row->voucher->vouchercode : '';
            });

            $table->editColumn('usage', function ($row) {
                return $row->usage ? $row->usage : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'username', 'is_redeem', 'voucher']);

            return $table->make(true);
        }

        return view('admin.voucherWallets.index');
    }

    public function create()
    {
        abort_if(Gate::denies('voucher_wallet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usernames = User::all()->pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vouchers = VoucherManagement::all()->pluck('vouchercode', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.voucherWallets.create', compact('usernames', 'vouchers'));
    }

    public function store(StoreVoucherWalletRequest $request)
    {
        $voucherWallet = VoucherWallet::create($request->all());

        return redirect()->route('admin.voucher-wallets.index');
    }

    public function edit(VoucherWallet $voucherWallet)
    {
        abort_if(Gate::denies('voucher_wallet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usernames = User::all()->pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vouchers = VoucherManagement::all()->pluck('vouchercode', 'id')->prepend(trans('global.pleaseSelect'), '');

        $voucherWallet->load('username', 'voucher');

        return view('admin.voucherWallets.edit', compact('usernames', 'vouchers', 'voucherWallet'));
    }

    public function update(UpdateVoucherWalletRequest $request, VoucherWallet $voucherWallet)
    {
        $voucherWallet->update($request->all());

        return redirect()->route('admin.voucher-wallets.index');
    }

    public function show(VoucherWallet $voucherWallet)
    {
        abort_if(Gate::denies('voucher_wallet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherWallet->load('username', 'voucher');

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
