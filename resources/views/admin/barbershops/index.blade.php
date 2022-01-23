@extends('layouts.admin')
@section('content')
<div class="content">
    @can('barbershop_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.barbershops.create') }}">
                    Tambah Barbershop
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Daftar Barbershop
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered text-nowrap table-striped table-hover datatable datatable-Barbershop">
                            <thead>
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Nama
                                    </th>
                                    <th>
                                       Alamat
                                    </th>
                                    <th>
                                        Telepon
                                    </th>
                                    <th>
                                        Jasa-Jasa
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($barbershops as $key => $barbershop)
                                    <tr data-entry-id="{{ $barbershop->id }}">
                                        <td>
                                            {{ $key+1 }}
                                        </td>
                                        <td>
                                            {{ $barbershop->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $barbershop->address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $barbershop->phone ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($barbershop->services as $key => $item)
                                                <span class="label label-info label-many">{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('barbershop_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.barbershops.show', $barbershop->id) }}">
                                                    Lihat
                                                </a>
                                            @endcan

                                            @can('barbershop_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.barbershops.edit', $barbershop->id) }}">
                                                   Ubah
                                                </a>
                                            @endcan

                                            @can('barbershop_delete')
                                                <form action="{{ route('admin.barbershops.destroy', $barbershop->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let table = $('.datatable-Barbershop:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection