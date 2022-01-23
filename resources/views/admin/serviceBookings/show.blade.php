@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Detail Order
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.service-bookings.index') }}">
                                Kembali
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                      ID Order
                                    </th>
                                    <td>
                                        {{ $serviceBooking->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Nama
                                    </th>
                                    <td>
                                        {{ $serviceBooking->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Email
                                    </th>
                                    <td>
                                        {{ $serviceBooking->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Telepon
                                    </th>
                                    <td>
                                        {{ $serviceBooking->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Alamat
                                    </th>
                                    <td>
                                        {{ $serviceBooking->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Tukang Cukur
                                    </th>
                                    <td>
                                        {{ $serviceBooking->stylist->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Jasa
                                    </th>
                                    <td>
                                        @foreach($serviceBooking->services as $key => $service)
                                            <span class="label label-info">{{ $service->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Barbershop
                                    </th>
                                    <td>
                                        {{ $serviceBooking->barbershop->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Waktu
                                    </th>
                                    <td>
                                        {{ $serviceBooking->time_book }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Total Harga
                                    </th>
                                    <td>
                                        {{ $serviceBooking->total_price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                    Catatan
                                    </th>
                                    <td>
                                        {{ $serviceBooking->text }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                    Status
                                    </th>
                                    <td>
                                        {{ $serviceBooking->status }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.service-bookings.index') }}">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection