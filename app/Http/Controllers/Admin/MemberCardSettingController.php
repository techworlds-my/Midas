<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMemberCardSettingRequest;
use App\Http\Requests\StoreMemberCardSettingRequest;
use App\Http\Requests\UpdateMemberCardSettingRequest;
use App\Models\MemberCardSetting;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MemberCardSettingController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('member_card_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MemberCardSetting::query()->select(sprintf('%s.*', (new MemberCardSetting)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'member_card_setting_show';
                $editGate      = 'member_card_setting_edit';
                $deleteGate    = 'member_card_setting_delete';
                $crudRoutePart = 'member-card-settings';

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
            $table->editColumn('company', function ($row) {
                return $row->company ? $row->company : "";
            });
            $table->editColumn('card_image', function ($row) {
                if ($photo = $row->card_image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('format', function ($row) {
                return $row->format ? $row->format : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'card_image']);

            return $table->make(true);
        }

        return view('admin.memberCardSettings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('member_card_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.memberCardSettings.create');
    }

    public function store(StoreMemberCardSettingRequest $request)
    {
        $memberCardSetting = MemberCardSetting::create($request->all());

        if ($request->input('card_image', false)) {
            $memberCardSetting->addMedia(storage_path('tmp/uploads/' . $request->input('card_image')))->toMediaCollection('card_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $memberCardSetting->id]);
        }

        return redirect()->route('admin.member-card-settings.index');
    }

    public function edit(MemberCardSetting $memberCardSetting)
    {
        abort_if(Gate::denies('member_card_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.memberCardSettings.edit', compact('memberCardSetting'));
    }

    public function update(UpdateMemberCardSettingRequest $request, MemberCardSetting $memberCardSetting)
    {
        $memberCardSetting->update($request->all());

        if ($request->input('card_image', false)) {
            if (!$memberCardSetting->card_image || $request->input('card_image') !== $memberCardSetting->card_image->file_name) {
                if ($memberCardSetting->card_image) {
                    $memberCardSetting->card_image->delete();
                }

                $memberCardSetting->addMedia(storage_path('tmp/uploads/' . $request->input('card_image')))->toMediaCollection('card_image');
            }
        } elseif ($memberCardSetting->card_image) {
            $memberCardSetting->card_image->delete();
        }

        return redirect()->route('admin.member-card-settings.index');
    }

    public function show(MemberCardSetting $memberCardSetting)
    {
        abort_if(Gate::denies('member_card_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.memberCardSettings.show', compact('memberCardSetting'));
    }

    public function destroy(MemberCardSetting $memberCardSetting)
    {
        abort_if(Gate::denies('member_card_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $memberCardSetting->delete();

        return back();
    }

    public function massDestroy(MassDestroyMemberCardSettingRequest $request)
    {
        MemberCardSetting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('member_card_setting_create') && Gate::denies('member_card_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MemberCardSetting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
