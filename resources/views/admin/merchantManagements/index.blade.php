@extends('layouts.admin')
@section('content')
@can('merchant_management_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.merchant-managements.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.merchantManagement.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.merchantManagement.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-MerchantManagement">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.merchantManagement.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantManagement.fields.company_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantManagement.fields.ssm') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantManagement.fields.address') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantManagement.fields.postcode') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantManagement.fields.in_charge_person') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantManagement.fields.contact') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantManagement.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantManagement.fields.position') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantManagement.fields.category') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantManagement.fields.sub_cateogry') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantManagement.fields.created_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.username') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantManagement.fields.website') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantManagement.fields.facebook') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantManagement.fields.instagram') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantManagement.fields.level') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantManagement.fields.merchant') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantManagement.fields.merchant_admin') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantManagement.fields.merchant_manager') }}
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
@can('merchant_management_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.merchant-managements.massDestroy') }}",
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
    ajax: "{{ route('admin.merchant-managements.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'company_name', name: 'company_name' },
{ data: 'ssm', name: 'ssm' },
{ data: 'address', name: 'address' },
{ data: 'postcode', name: 'postcode' },
{ data: 'in_charge_person', name: 'in_charge_person' },
{ data: 'contact', name: 'contact' },
{ data: 'email', name: 'email' },
{ data: 'position', name: 'position' },
{ data: 'category_cateogry', name: 'category.cateogry' },
{ data: 'sub_cateogry_sub_category', name: 'sub_cateogry.sub_category' },
{ data: 'created_by_username', name: 'created_by.username' },
{ data: 'created_by.username', name: 'created_by.username' },
{ data: 'website', name: 'website' },
{ data: 'facebook', name: 'facebook' },
{ data: 'instagram', name: 'instagram' },
{ data: 'level_level', name: 'level.level' },
{ data: 'merchant', name: 'merchant' },
{ data: 'merchant_admin', name: 'merchant_admin' },
{ data: 'merchant_manager', name: 'merchant_manager' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-MerchantManagement').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection