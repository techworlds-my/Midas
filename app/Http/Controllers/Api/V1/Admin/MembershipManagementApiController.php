<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMembershipManagementRequest;
use App\Http\Requests\UpdateMembershipManagementRequest;
use App\Http\Resources\Admin\MembershipManagementResource;
use App\Models\MembershipManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MembershipManagementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('membership_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MembershipManagementResource(MembershipManagement::with(['user_name'])->get());
    }

    public function store(StoreMembershipManagementRequest $request)
    {
        $membershipManagement = MembershipManagement::create($request->all());

        return (new MembershipManagementResource($membershipManagement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MembershipManagement $membershipManagement)
    {
        abort_if(Gate::denies('membership_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MembershipManagementResource($membershipManagement->load(['user_name']));
    }

    public function update(UpdateMembershipManagementRequest $request, MembershipManagement $membershipManagement)
    {
        $membershipManagement->update($request->all());

        return (new MembershipManagementResource($membershipManagement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MembershipManagement $membershipManagement)
    {
        abort_if(Gate::denies('membership_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $membershipManagement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
