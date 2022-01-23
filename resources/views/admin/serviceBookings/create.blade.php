@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.serviceBooking.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.service-bookings.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.serviceBooking.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.serviceBooking.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="required" for="email">{{ trans('cruds.serviceBooking.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.serviceBooking.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label class="required" for="phone">{{ trans('cruds.serviceBooking.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                            @if($errors->has('phone'))
                                <span class="help-block" role="alert">{{ $errors->first('phone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.serviceBooking.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label class="required" for="address">{{ trans('cruds.serviceBooking.fields.address') }}</label>
                            <textarea class="form-control" name="address" id="address" required>{{ old('address') }}</textarea>
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.serviceBooking.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('stylist') ? 'has-error' : '' }}">
                            <label class="required" for="stylist_id">{{ trans('cruds.serviceBooking.fields.stylist') }}</label>
                            <select class="form-control select2" name="stylist_id" id="stylist_id" required>
                                @foreach($stylists as $id => $entry)
                                    <option value="{{ $id }}" {{ old('stylist_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('stylist'))
                                <span class="help-block" role="alert">{{ $errors->first('stylist') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.serviceBooking.fields.stylist_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('services') ? 'has-error' : '' }}">
                            <label class="required" for="services">{{ trans('cruds.serviceBooking.fields.service') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="services[]" id="services" multiple required>
                                @foreach($services as $id => $service)
                                    <option value="{{ $id }}" {{ in_array($id, old('services', [])) ? 'selected' : '' }}>{{ $service }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('services'))
                                <span class="help-block" role="alert">{{ $errors->first('services') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.serviceBooking.fields.service_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('barbershop') ? 'has-error' : '' }}">
                            <label class="required" for="barbershop_id">{{ trans('cruds.serviceBooking.fields.barbershop') }}</label>
                            <select class="form-control select2" name="barbershop_id" id="barbershop_id" required>
                                @foreach($barbershops as $id => $entry)
                                    <option value="{{ $id }}" {{ old('barbershop_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('barbershop'))
                                <span class="help-block" role="alert">{{ $errors->first('barbershop') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.serviceBooking.fields.barbershop_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('time_book') ? 'has-error' : '' }}">
                            <label class="required" for="time_book">{{ trans('cruds.serviceBooking.fields.time_book') }}</label>
                            <input class="form-control datetime" type="text" name="time_book" id="time_book" value="{{ old('time_book') }}" required>
                            @if($errors->has('time_book'))
                                <span class="help-block" role="alert">{{ $errors->first('time_book') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.serviceBooking.fields.time_book_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_price') ? 'has-error' : '' }}">
                            <label for="total_price">{{ trans('cruds.serviceBooking.fields.total_price') }}</label>
                            <input class="form-control" type="number" name="total_price" id="total_price" value="{{ old('total_price', '') }}" step="0.01">
                            @if($errors->has('total_price'))
                                <span class="help-block" role="alert">{{ $errors->first('total_price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.serviceBooking.fields.total_price_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
                            <label for="text">{{ trans('cruds.serviceBooking.fields.text') }}</label>
                            <textarea class="form-control" name="text" id="text">{{ old('text') }}</textarea>
                            @if($errors->has('text'))
                                <span class="help-block" role="alert">{{ $errors->first('text') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.serviceBooking.fields.text_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection