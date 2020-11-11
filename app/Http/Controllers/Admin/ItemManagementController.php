<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyItemManagementRequest;
use App\Http\Requests\StoreItemManagementRequest;
use App\Http\Requests\UpdateItemManagementRequest;
use App\Models\ItemCateogry;
use App\Models\ItemManagement;
use App\Models\MerchantManagement;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ItemManagementController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('item_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ItemManagement::with(['category', 'merchant', 'created_by'])->select(sprintf('%s.*', (new ItemManagement)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'item_management_show';
                $editGate      = 'item_management_edit';
                $deleteGate    = 'item_management_delete';
                $crudRoutePart = 'item-managements';

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
            $table->addColumn('category_category', function ($row) {
                return $row->category ? $row->category->category : '';
            });

            $table->editColumn('category.in_enable', function ($row) {
                return $row->category ? (is_string($row->category) ? $row->category : $row->category->in_enable) : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : "";
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : "";
            });
            $table->editColumn('sales_price', function ($row) {
                return $row->sales_price ? $row->sales_price : "";
            });
            $table->editColumn('image', function ($row) {
                if (!$row->image) {
                    return '';
                }

                $links = [];

                foreach ($row->image as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->editColumn('is_recommended', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_recommended ? 'checked' : null) . '>';
            });
            $table->editColumn('is_popular', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_popular ? 'checked' : null) . '>';
            });
            $table->editColumn('is_new', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_new ? 'checked' : null) . '>';
            });
            $table->editColumn('rate', function ($row) {
                return $row->rate ? $row->rate : "";
            });
            $table->editColumn('is_active', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_active ? 'checked' : null) . '>';
            });
            $table->editColumn('is_veg', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_veg ? 'checked' : null) . '>';
            });
            $table->editColumn('is_halal', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_halal ? 'checked' : null) . '>';
            });
            $table->addColumn('merchant_merchant', function ($row) {
                return $row->merchant ? $row->merchant->merchant : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'category', 'image', 'is_recommended', 'is_popular', 'is_new', 'is_active', 'is_veg', 'is_halal', 'merchant']);

            return $table->make(true);
        }

        return view('admin.itemManagements.index');
    }

    public function create()
    {
        abort_if(Gate::denies('item_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ItemCateogry::all()->pluck('category', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchants = MerchantManagement::all()->pluck('merchant', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.itemManagements.create', compact('categories', 'merchants'));
    }

    public function store(StoreItemManagementRequest $request)
    {
        $itemManagement = ItemManagement::create($request->all());

        foreach ($request->input('image', []) as $file) {
            $itemManagement->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $itemManagement->id]);
        }

        return redirect()->route('admin.item-managements.index');
    }

    public function edit(ItemManagement $itemManagement)
    {
        abort_if(Gate::denies('item_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ItemCateogry::all()->pluck('category', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchants = MerchantManagement::all()->pluck('merchant', 'id')->prepend(trans('global.pleaseSelect'), '');

        $itemManagement->load('category', 'merchant', 'created_by');

        return view('admin.itemManagements.edit', compact('categories', 'merchants', 'itemManagement'));
    }

    public function update(UpdateItemManagementRequest $request, ItemManagement $itemManagement)
    {
        $itemManagement->update($request->all());

        if (count($itemManagement->image) > 0) {
            foreach ($itemManagement->image as $media) {
                if (!in_array($media->file_name, $request->input('image', []))) {
                    $media->delete();
                }
            }
        }

        $media = $itemManagement->image->pluck('file_name')->toArray();

        foreach ($request->input('image', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $itemManagement->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('image');
            }
        }

        return redirect()->route('admin.item-managements.index');
    }

    public function show(ItemManagement $itemManagement)
    {
        abort_if(Gate::denies('item_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemManagement->load('category', 'merchant', 'created_by');

        return view('admin.itemManagements.show', compact('itemManagement'));
    }

    public function destroy(ItemManagement $itemManagement)
    {
        abort_if(Gate::denies('item_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemManagement->delete();

        return back();
    }

    public function massDestroy(MassDestroyItemManagementRequest $request)
    {
        ItemManagement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('item_management_create') && Gate::denies('item_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ItemManagement();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
