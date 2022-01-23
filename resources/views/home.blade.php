@extends('layouts.admin')

@section('styles')

<style>
.card-counter {
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
}

.card-counter:hover {
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
}

.card-counter.primary {
    background-color: #007bff;
    color: #FFF;
}

.card-counter.danger {
    background-color: #ef5350;
    color: #FFF;
}

.card-counter.success {
    background-color: #66bb6a;
    color: #FFF;
}

.card-counter.info {
    background-color: #26c6da;
    color: #FFF;
}

.card-counter i {
    font-size: 5em;
    opacity: 0.2;
}

.card-counter .count-numbers {
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
}

.card-counter .count-name {
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
}
</style>
@endsection
@section('content')
<div class="content">

    <div class="row">
        <div class="panel panel-default p-2">
            <div class="panel-heading">
                Dashboard
            </div>

            @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="col-md-3">
                <div class="card-counter primary">
                    <i class="fa fa-code-fork"></i>
                    <span class="count-numbers">{{ $barber['barbershop'] ?? '0'}}</span>
                    <span class="count-name">Barbershop</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-counter danger">
                    <i class="fa fa-ticket"></i>
                    <span class="count-numbers">{{ $barber['stylist'] ?? '0'}}</span>
                    <span class="count-name">Tukang Cukur</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-counter success">
                    <i class="fa fa-database"></i>
                    <span class="count-numbers">{{ $barber['jasa'] ?? '0'}}</span>
                    <span class="count-name">Jasa service</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-counter info">
                    <i class="fa fa-users"></i>
                    <span class="count-numbers">{{ $barber['order'] ?? '0'}}</span>
                    <span class="count-name">Order Booking</span>
                </div>
            </div>

            @if(count($serviceBookings) > 0)
            <div>
                <table
                    class=" table table-bordered text-nowrap table-striped table-hover datatable datatable-ServiceBooking">
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
                                Catatan
                            </th>
                            <th>
                                Total Harga
                            </th>
                            <th>
                                Status
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
                                {{ $serviceBooking->text ?? '' }}
                            </td>
                            <td>
                                Rp.&nbsp;{{ number_format($serviceBooking->total_price) ?? '' }}
                            </td>
                            <td>
                                {{ $serviceBooking->status ?? '' }}
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>



</div>
@endsection
@section('scripts')
@parent

@endsection