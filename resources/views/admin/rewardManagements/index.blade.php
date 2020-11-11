@extends('layouts.admin')
@section('content')
@can('reward_management_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.reward-managements.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.rewardManagement.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.rewardManagement.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-RewardManagement">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.rewardManagement.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.rewardManagement.fields.merchant') }}
                    </th>
                    <th>
                        {{ trans('cruds.rewardManagement.fields.category') }}
                    </th>
                    <th>
                        {{ trans('cruds.rewardCatogery.fields.is_enable') }}
                    </th>
                    <th>
                        {{ trans('cruds.rewardManagement.fields.expired') }}
                    </th>
                    <th>
                        {{ trans('cruds.rewardManagement.fields.title') }}
                    </th>
                    <th>
                        {{ trans('cruds.rewardManagement.fields.top_up_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.rewardManagement.fields.purchase_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.rewardManagement.fields.referral_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.rewardManagement.fields.bonus') }}
                    </th>
                    <th>
                        {{ trans('cruds.rewardManagement.fields.point') }}
                    </th>
                    <th>
                        {{ trans('cruds.rewardManagement.fields.voucher') }}
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
@can('reward_management_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.reward-managements.massDestroy') }}",
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
    ajax: "{{ route('admin.reward-managements.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'merchant_merchant', name: 'merchant.merchant' },
{ data: 'category_category', name: 'category.category' },
{ data: 'category.is_enable', name: 'category.is_enable' },
{ data: 'expired', name: 'expired' },
{ data: 'title', name: 'title' },
{ data: 'top_up_amount', name: 'top_up_amount' },
{ data: 'purchase_amount', name: 'purchase_amount' },
{ data: 'referral_amount', name: 'referral_amount' },
{ data: 'bonus', name: 'bonus' },
{ data: 'point', name: 'point' },
{ data: 'voucher_vouchercode', name: 'voucher.vouchercode' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-RewardManagement').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection