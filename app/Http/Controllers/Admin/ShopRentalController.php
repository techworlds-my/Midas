<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyShopRentalRequest;
use App\Http\Requests\StoreShopRentalRequest;
use App\Http\Requests\UpdateShopRentalRequest;
use App\Models\MerchantManagement;
use App\Models\ShopRental;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ShopRentalController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('shop_rental_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ShopRental::with(['merchant'])->select(sprintf('%s.*', (new ShopRental)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'shop_rental_show';
                $editGate      = 'shop_rental_edit';
                $deleteGate    = 'shop_rental_delete';
                $crudRoutePart = 'shop-rentals';

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

            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : "";
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : "";
            });
            $table->editColumn('payment_method', function ($row) {
                return $row->payment_method ? $row->payment_method : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'merchant']);

            return $table->make(true);
        }

        return view('admin.shopRentals.index');
    }

    public function create()
    {
        abort_if(Gate::denies('shop_rental_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchants = MerchantManagement::all()->pluck('merchant', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.shopRentals.create', compact('merchants'));
    }

    public function store(StoreShopRentalRequest $request)
    {
        $shopRental = ShopRental::create($request->all());

        return redirect()->route('admin.shop-rentals.index');
    }

    public function edit(ShopRental $shopRental)
    {
        abort_if(Gate::denies('shop_rental_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchants = MerchantManagement::all()->pluck('merchant', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shopRental->load('merchant');

        return view('admin.shopRentals.edit', compact('merchants', 'shopRental'));
    }

    public function update(UpdateShopRentalRequest $request, ShopRental $shopRental)
    {
        $shopRental->update($request->all());

        return redirect()->route('admin.shop-rentals.index');
    }

    public function show(ShopRental $shopRental)
    {
        abort_if(Gate::denies('shop_rental_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shopRental->load('merchant');

        return view('admin.shopRentals.show', compact('shopRental'));
    }

    public function destroy(ShopRental $shopRental)
    {
        abort_if(Gate::denies('shop_rental_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shopRental->delete();

        return back();
    }

    public function massDestroy(MassDestroyShopRentalRequest $request)
    {
        ShopRental::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
