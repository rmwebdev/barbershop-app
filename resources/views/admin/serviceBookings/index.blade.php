@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Daftar Order 
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered text-nowrap table-striped table-hover datatable datatable-ServiceBooking">
                            <thead>
                                <tr>
                                    
                                    <th>
                                        No
                                    </th>
                                    <th>
                                       Nama
                                    </th>
                                    <th>
                                        email
                                    </th>
                                    <th>
                                       Telepon
                                    </th>
                                    <th>
                                       Alamat
                                    </th>
                                    <th>
                                       Tukang Cukur
                                    </th>
                                    <th>
                                        Jasa
                                    </th>
                                    <th>
                                        Barbershop
                                    </th>
                                    <th>
                                       Waktu
                                    </th>
                                    <th>
                                        Total Harga
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($serviceBookings as $key => $serviceBooking)
                                    <tr data-entry-id="{{ $serviceBooking->id }}">
                                        <td>
                                            {{ $key+1 }}
                                        </td>
                                        <td>
                                            {{ $serviceBooking->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $serviceBooking->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $serviceBooking->phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $serviceBooking->address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $serviceBooking->stylist->name ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($serviceBooking->services as $key => $item)
                                                <span class="label label-info label-many">{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $serviceBooking->barbershop->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $serviceBooking->time_book ?? '' }}
                                        </td>
                                        <td>
                                        Rp.&nbsp;{{ number_format($serviceBooking->total_price) ?? '' }}
                                        </td>
                                        <td>
                                            @if($serviceBooking->status == "Proses")
                                                <span class="label label-warning label-many">{{$serviceBooking->status }}</span>
                                            @else
                                                <span class="label label-success label-many">{{ $serviceBooking->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('service_booking_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.service-bookings.show', $serviceBooking->id) }}">
                                                   Lihat
                                                </a>
                                            @endcan
                                            @if($serviceBooking->status == 'Proses')
                                            @can('service_booking_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.service-bookings.edit', $serviceBooking->id) }}">
                                                    Ubah
                                                </a>
                                            @endcan
                                            @endif

                                            <!-- @can('service_booking_delete')
                                                <form action="{{ route('admin.service-bookings.destroy', $serviceBooking->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="Hapus">
                                                </form>
                                            @endcan -->

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
  let table = $('.datatable-ServiceBooking:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection