@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Detail Peran
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.roles.index') }}">
                               Kembali
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        ID Peran
                                    </th>
                                    <td>
                                        {{ $role->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Nama
                                    </th>
                                    <td>
                                        {{ $role->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                       Hak Akses
                                    </th>
                                    <td>
                                        @foreach($role->permissions as $key => $permissions)
                                            <span class="label label-info">{{ $permissions->title }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.roles.index') }}">
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