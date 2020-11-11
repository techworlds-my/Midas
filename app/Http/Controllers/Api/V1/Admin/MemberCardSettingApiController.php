<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreMemberCardSettingRequest;
use App\Http\Requests\UpdateMemberCardSettingRequest;
use App\Http\Resources\Admin\MemberCardSettingResource;
use App\Models\MemberCardSetting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MemberCardSettingApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('member_card_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MemberCardSettingResource(MemberCardSetting::all());
    }

    public function store(StoreMemberCardSettingRequest $request)
    {
        $memberCardSetting = MemberCardSetting::create($request->all());

        if ($request->input('card_image', false)) {
            $memberCardSetting->addMedia(storage_path('tmp/uploads/' . $request->input('card_image')))->toMediaCollection('card_image');
        }

        return (new MemberCardSettingResource($memberCardSetting))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MemberCardSetting $memberCardSetting)
    {
        abort_if(Gate::denies('member_card_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MemberCardSettingResource($memberCardSetting);
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

        return (new MemberCardSettingResource($memberCardSetting))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MemberCardSetting $memberCardSetting)
    {
        abort_if(Gate::denies('member_card_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $memberCardSetting->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
