@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Detail Tukang Cukur
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.stylists.index') }}">
                               Kembali
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        ID Tukang Cukur
                                    </th>
                                    <td>
                                        {{ $stylist->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Nama
                                    </th>
                                    <td>
                                        {{ $stylist->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                       Telepon
                                    </th>
                                    <td>
                                        {{ $stylist->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Keahlian
                                    </th>
                                    <td>
                                        {{ App\Models\Stylist::SKILLS_SELECT[$stylist->skills] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Barbershop
                                    </th>
                                    <td>
                                        {{ $stylist->barbershop->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Foto
                                    </th>
                                    <td>
                                        @if($stylist->thumb)
                                            <a href="{{ $stylist->thumb->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $stylist->thumb->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.stylists.index') }}">
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