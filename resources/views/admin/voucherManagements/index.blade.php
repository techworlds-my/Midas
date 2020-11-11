@extends('layouts.admin')
@section('content')
@can('voucher_management_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.voucher-managements.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.voucherManagement.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.voucherManagement.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-VoucherManagement">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.voucherManagement.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucherManagement.fields.merchant') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucherManagement.fields.vouchercode') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucherManagement.fields.discount_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucherManagement.fields.value') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucherManagement.fields.min_spend') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucherManagement.fields.max_spend') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucherManagement.fields.excluded_sales_item') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucherManagement.fields.item_category') }}
                    </th>
                    <th>
                        {{ trans('cruds.itemCateogry.fields.in_enable') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucherManagement.fields.item') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucherManagement.fields.usage_limit') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucherManagement.fields.limit_item') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucherManagement.fields.limit_per_user') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucherManagement.fields.expired') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucherManagement.fields.description') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucherManagement.fields.is_free_shipping') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucherManagement.fields.is_credit_purchase') }}
                    </th>
                    <th>
                        {{ trans('cruds.voucherManagement.fields.redeem_point') }}
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
@can('voucher_management_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.voucher-managements.massDestroy') }}",
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
    ajax: "{{ route('admin.voucher-managements.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'merchant_merchant', name: 'merchant.merchant' },
{ data: 'vouchercode', name: 'vouchercode' },
{ data: 'discount_type', name: 'discount_type' },
{ data: 'value', name: 'value' },
{ data: 'min_spend', name: 'min_spend' },
{ data: 'max_spend', name: 'max_spend' },
{ data: 'excluded_sales_item', name: 'excluded_sales_item' },
{ data: 'item_category_category', name: 'item_category.category' },
{ data: 'item_category.in_enable', name: 'item_category.in_enable' },
{ data: 'item', name: 'items.title' },
{ data: 'usage_limit', name: 'usage_limit' },
{ data: 'limit_item', name: 'limit_item' },
{ data: 'limit_per_user', name: 'limit_per_user' },
{ data: 'expired', name: 'expired' },
{ data: 'description', name: 'description' },
{ data: 'is_free_shipping', name: 'is_free_shipping' },
{ data: 'is_credit_purchase', name: 'is_credit_purchase' },
{ data: 'redeem_point', name: 'redeem_point' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-VoucherManagement').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection