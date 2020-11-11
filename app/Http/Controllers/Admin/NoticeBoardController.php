<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNoticeBoardRequest;
use App\Http\Requests\StoreNoticeBoardRequest;
use App\Http\Requests\UpdateNoticeBoardRequest;
use App\Models\NoticeBoard;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class NoticeBoardController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('notice_board_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = NoticeBoard::query()->select(sprintf('%s.*', (new NoticeBoard)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'notice_board_show';
                $editGate      = 'notice_board_edit';
                $deleteGate    = 'notice_board_delete';
                $crudRoutePart = 'notice-boards';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : "";
            });
            $table->editColumn('content', function ($row) {
                return $row->content ? $row->content : "";
            });

            $table->editColumn('post_to', function ($row) {
                return $row->post_to ? $row->post_to : "";
            });
            $table->editColumn('pinned', function ($row) {
                return $row->pinned ? $row->pinned : "";
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : "";
            });
            $table->editColumn('post_by', function ($row) {
                return $row->post_by ? $row->post_by : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.noticeBoards.index');
    }

    public function create()
    {
        abort_if(Gate::denies('notice_board_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.noticeBoards.create');
    }

    public function store(StoreNoticeBoardRequest $request)
    {
        $noticeBoard = NoticeBoard::create($request->all());

        return redirect()->route('admin.notice-boards.index');
    }

    public function edit(NoticeBoard $noticeBoard)
    {
        abort_if(Gate::denies('notice_board_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.noticeBoards.edit', compact('noticeBoard'));
    }

    public function update(UpdateNoticeBoardRequest $request, NoticeBoard $noticeBoard)
    {
        $noticeBoard->update($request->all());

        return redirect()->route('admin.notice-boards.index');
    }

    public function show(NoticeBoard $noticeBoard)
    {
        abort_if(Gate::denies('notice_board_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.noticeBoards.show', compact('noticeBoard'));
    }

    public function destroy(NoticeBoard $noticeBoard)
    {
        abort_if(Gate::denies('notice_board_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $noticeBoard->delete();

        return back();
    }

    public function massDestroy(MassDestroyNoticeBoardRequest $request)
    {
        NoticeBoard::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
