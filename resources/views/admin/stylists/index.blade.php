@extends('layouts.admin')
@section('content')
<div class="content">
    @can('stylist_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.stylists.create') }}">
                   Tambah Tukang Cukur
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Daftar Tukang Cukur
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Stylist">
                            <thead>
                                <tr>
                                    
                                    <th>
                                       No
                                    </th>
                                    <th>
                                       Nama
                                    </th>
                                    <th>
                                        Telepon
                                    </th>
                                    <th>
                                        Keahlian
                                    </th>
                                    <th>
                                        Barbershop
                                    </th>
                                    <th>
                                        Foto
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stylists as $key => $stylist)
                                    <tr data-entry-id="{{ $stylist->id }}">
                                      
                                        <td>
                                            {{ $key+1 }}
                                        </td>
                                        <td>
                                            {{ $stylist->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $stylist->phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Stylist::SKILLS_SELECT[$stylist->skills] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $stylist->barbershop->name ?? '' }}
                                        </td>
                                        <td>
                                            @if($stylist->thumb)
                                                <a href="{{ $stylist->thumb->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $stylist->thumb->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @can('stylist_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.stylists.show', $stylist->id) }}">
                                                    Lihat
                                                </a>
                                            @endcan

                                            @can('stylist_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.stylists.edit', $stylist->id) }}">
                                                    Ubah
                                                </a>
                                            @endcan

                                            @can('stylist_delete')
                                                <form action="{{ route('admin.stylists.destroy', $stylist->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let table = $('.datatable-Stylist:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection