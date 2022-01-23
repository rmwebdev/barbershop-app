@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Detail Jasa
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.services.index') }}">
                               Kembali
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                       Jasa ID
                                    </th>
                                    <td>
                                        {{ $service->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                       Nama
                                    </th>
                                    <td>
                                        {{ $service->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                       Keterangan
                                    </th>
                                    <td>
                                        {{ $service->desc }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Foto
                                    </th>
                                    <td>
                                        @if($service->thumb)
                                            <a href="{{ $service->thumb->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $service->thumb->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                       Harga
                                    </th>
                                    <td>
                                        {{ $service->price }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.services.index') }}">
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