@extends('layouts.admin')
@section('content')
@can('order_management_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.order-managements.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.orderManagement.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.orderManagement.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-OrderManagement">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.orderManagement.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderManagement.fields.order') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderManagement.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderStatus.fields.in_enable') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderManagement.fields.username') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderManagement.fields.voucher') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderManagement.fields.address') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderManagement.fields.price') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderManagement.fields.delivery_charge') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderManagement.fields.tax') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderManagement.fields.total') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderManagement.fields.paymentmethod') }}
                    </th>
                    <th>
                        {{ trans('cruds.paymentMethod.fields.in_enable') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderManagement.fields.comment') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderManagement.fields.merchant') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderManagement.fields.transaction') }}
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
@can('order_management_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.order-managements.massDestroy') }}",
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
    ajax: "{{ route('admin.order-managements.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'order', name: 'order' },
{ data: 'status_status', name: 'status.status' },
{ data: 'status.in_enable', name: 'status.in_enable' },
{ data: 'username_username', name: 'username.username' },
{ data: 'voucher', name: 'voucher' },
{ data: 'address', name: 'address' },
{ data: 'price', name: 'price' },
{ data: 'delivery_charge', name: 'delivery_charge' },
{ data: 'tax', name: 'tax' },
{ data: 'total', name: 'total' },
{ data: 'paymentmethod_method', name: 'paymentmethod.method' },
{ data: 'paymentmethod.in_enable', name: 'paymentmethod.in_enable' },
{ data: 'comment', name: 'comment' },
{ data: 'merchant', name: 'merchant' },
{ data: 'transaction', name: 'transaction' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-OrderManagement').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection