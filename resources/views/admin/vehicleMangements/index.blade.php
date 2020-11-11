@extends('layouts.admin')
@section('content')
@can('vehicle_mangement_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.vehicle-mangements.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.vehicleMangement.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.vehicleMangement.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-VehicleMangement">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.vehicleMangement.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicleMangement.fields.username') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicleMangement.fields.car_plate') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicleMangement.fields.is_verify') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicleMangement.fields.brand') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicleMangement.fields.model') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicleMangement.fields.color') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicleMangement.fields.is_season_park') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicleMangement.fields.driver_count') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicleMangement.fields.is_resident') }}
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
@can('vehicle_mangement_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.vehicle-mangements.massDestroy') }}",
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
    ajax: "{{ route('admin.vehicle-mangements.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'username_username', name: 'username.username' },
{ data: 'car_plate', name: 'car_plate' },
{ data: 'is_verify', name: 'is_verify' },
{ data: 'brand_brand', name: 'brand.brand' },
{ data: 'model', name: 'model' },
{ data: 'color', name: 'color' },
{ data: 'is_season_park', name: 'is_season_park' },
{ data: 'driver_count', name: 'driver_count' },
{ data: 'is_resident', name: 'is_resident' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-VehicleMangement').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection