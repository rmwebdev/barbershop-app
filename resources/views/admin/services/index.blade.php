@extends('layouts.admin')
@section('content')
<div class="content">
    @can('service_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.services.create') }}">
                   Buat Jasa
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Daftar Jasa
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered  text-nowrap table-striped table-hover datatable datatable-Service">
                            <thead>
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>
                                      Nama
                                    </th>
                                    <th>
                                      Keterangan
                                    </th>
                                    <th>
                                        Harga (Rp)
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $key => $service)
                                    <tr data-entry-id="{{ $service->id }}">
                                        <td>
                                            {{ $key+1 }}
                                        </td>
                                        <td>
                                            {{ $service->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $service->desc ?? '' }}
                                        </td>
                                        <td>
                                            {{ $service->price ?? '' }}
                                        </td>
                                        <td>
                                            @can('service_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.services.show', $service->id) }}">
                                                    Lihat
                                                </a>
                                            @endcan

                                            @can('service_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.services.edit', $service->id) }}">
                                                   Ubah
                                                </a>
                                            @endcan

                                            @can('service_delete')
                                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="Hapus">
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



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Service:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection