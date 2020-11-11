@extends('layouts.admin')
@section('content')
@can('item_management_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.item-managements.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.itemManagement.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.itemManagement.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ItemManagement">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.itemManagement.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.itemManagement.fields.category') }}
                    </th>
                    <th>
                        {{ trans('cruds.itemCateogry.fields.in_enable') }}
                    </th>
                    <th>
                        {{ trans('cruds.itemManagement.fields.title') }}
                    </th>
                    <th>
                        {{ trans('cruds.itemManagement.fields.price') }}
                    </th>
                    <th>
                        {{ trans('cruds.itemManagement.fields.sales_price') }}
                    </th>
                    <th>
                        {{ trans('cruds.itemManagement.fields.image') }}
                    </th>
                    <th>
                        {{ trans('cruds.itemManagement.fields.is_recommended') }}
                    </th>
                    <th>
                        {{ trans('cruds.itemManagement.fields.is_popular') }}
                    </th>
                    <th>
                        {{ trans('cruds.itemManagement.fields.is_new') }}
                    </th>
                    <th>
                        {{ trans('cruds.itemManagement.fields.rate') }}
                    </th>
                    <th>
                        {{ trans('cruds.itemManagement.fields.is_active') }}
                    </th>
                    <th>
                        {{ trans('cruds.itemManagement.fields.is_veg') }}
                    </th>
                    <th>
                        {{ trans('cruds.itemManagement.fields.is_halal') }}
                    </th>
                    <th>
                        {{ trans('cruds.itemManagement.fields.merchant') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('item_management_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.item-managements.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.item-managements.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'category_category', name: 'category.category' },
{ data: 'category.in_enable', name: 'category.in_enable' },
{ data: 'title', name: 'title' },
{ data: 'price', name: 'price' },
{ data: 'sales_price', name: 'sales_price' },
{ data: 'image', name: 'image', sortable: false, searchable: false },
{ data: 'is_recommended', name: 'is_recommended' },
{ data: 'is_popular', name: 'is_popular' },
{ data: 'is_new', name: 'is_new' },
{ data: 'rate', name: 'rate' },
{ data: 'is_active', name: 'is_active' },
{ data: 'is_veg', name: 'is_veg' },
{ data: 'is_halal', name: 'is_halal' },
{ data: 'merchant_merchant', name: 'merchant.merchant' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-ItemManagement').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection