@extends('layouts.admin')
@section('content')
@can('facility_payment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.facility-payments.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.facilityPayment.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.facilityPayment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-FacilityPayment">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.facilityPayment.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.facilityPayment.fields.facility') }}
                    </th>
                    <th>
                        {{ trans('cruds.facilityPayment.fields.username') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.username') }}
                    </th>
                    <th>
                        {{ trans('cruds.facilityPayment.fields.amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.facilityPayment.fields.payment_method') }}
                    </th>
                    <th>
                        {{ trans('cruds.facilityPayment.fields.reciept') }}
                    </th>
                    <th>
                        {{ trans('cruds.facilityPayment.fields.status') }}
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
@can('facility_payment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.facility-payments.massDestroy') }}",
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
    ajax: "{{ route('admin.facility-payments.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'facility_name', name: 'facility.name' },
{ data: 'username_username', name: 'username.username' },
{ data: 'username.username', name: 'username.username' },
{ data: 'amount', name: 'amount' },
{ data: 'payment_method_method', name: 'payment_method.method' },
{ data: 'reciept', name: 'reciept', sortable: false, searchable: false },
{ data: 'status', name: 'status' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-FacilityPayment').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection