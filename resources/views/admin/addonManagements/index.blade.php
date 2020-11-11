@extends('layouts.admin')
@section('content')
@can('addon_management_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.addon-managements.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.addonManagement.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.addonManagement.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AddonManagement">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.addonManagement.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.addonManagement.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.addOnCategory.fields.is_enable') }}
                        </th>
                        <th>
                            {{ trans('cruds.addonManagement.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.addonManagement.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.addonManagement.fields.is_enable') }}
                        </th>
                        <th>
                            {{ trans('cruds.addonManagement.fields.item') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($addonManagements as $key => $addonManagement)
                        <tr data-entry-id="{{ $addonManagement->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $addonManagement->id ?? '' }}
                            </td>
                            <td>
                                {{ $addonManagement->category->category ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $addonManagement->category->is_enable ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $addonManagement->category->is_enable ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $addonManagement->title ?? '' }}
                            </td>
                            <td>
                                {{ $addonManagement->price ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $addonManagement->is_enable ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $addonManagement->is_enable ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $addonManagement->item->title ?? '' }}
                            </td>
                            <td>
                                @can('addon_management_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.addon-managements.show', $addonManagement->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('addon_management_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.addon-managements.edit', $addonManagement->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('addon_management_delete')
                                    <form action="{{ route('admin.addon-managements.destroy', $addonManagement->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('addon_management_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.addon-managements.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-AddonManagement:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection