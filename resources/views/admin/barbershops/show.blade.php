@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Detail Barbershop
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.barbershops.index') }}">
                               Kembali
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                      Barbershop ID
                                    </th>
                                    <td>
                                        {{ $barbershop->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                       Nama
                                    </th>
                                    <td>
                                        {{ $barbershop->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Alamat
                                    </th>
                                    <td>
                                        {{ $barbershop->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                       Telepon
                                    </th>
                                    <td>
                                        {{ $barbershop->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                       Foto
                                    </th>
                                    <td>
                                        @if($barbershop->photo)
                                            <a href="{{ $barbershop->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $barbershop->photo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Jasa-Jasa
                                    </th>
                                    <td>
                                        @foreach($barbershop->services as $key => $service)
                                            <span class="label label-info">{{ $service->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Tentang Barbershop
                                    </th>
                                    <td>
                                    {{ $barbershop->about_barber }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.barbershops.index') }}">
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