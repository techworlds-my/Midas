<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAddOnCategoryRequest;
use App\Http\Requests\StoreAddOnCategoryRequest;
use App\Http\Requests\UpdateAddOnCategoryRequest;
use App\Models\AddOnCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AddOnCategoryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('add_on_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AddOnCategory::query()->select(sprintf('%s.*', (new AddOnCategory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'add_on_category_show';
                $editGate      = 'add_on_category_edit';
                $deleteGate    = 'add_on_category_delete';
                $crudRoutePart = 'add-on-categories';

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
            $table->editColumn('category', function ($row) {
                return $row->category ? $row->category : "";
            });
            $table->editColumn('is_enable', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_enable ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'is_enable']);

            return $table->make(true);
        }

        return view('admin.addOnCategories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('add_on_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addOnCategories.create');
    }

    public function store(StoreAddOnCategoryRequest $request)
    {
        $addOnCategory = AddOnCategory::create($request->all());

        return redirect()->route('admin.add-on-categories.index');
    }

    public function edit(AddOnCategory $addOnCategory)
    {
        abort_if(Gate::denies('add_on_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addOnCategories.edit', compact('addOnCategory'));
    }

    public function update(UpdateAddOnCategoryRequest $request, AddOnCategory $addOnCategory)
    {
        $addOnCategory->update($request->all());

        return redirect()->route('admin.add-on-categories.index');
    }

    public function show(AddOnCategory $addOnCategory)
    {
        abort_if(Gate::denies('add_on_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addOnCategories.show', compact('addOnCategory'));
    }

    public function destroy(AddOnCategory $addOnCategory)
    {
        abort_if(Gate::denies('add_on_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addOnCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddOnCategoryRequest $request)
    {
        AddOnCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
