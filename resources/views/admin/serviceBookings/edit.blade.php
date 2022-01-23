@extends('layouts.admin')
@section('styles')
<style>
    /* #select2-stylist_id-container {
    display: none; */
}
</style>

@endsection
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Proses Order
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.service-bookings.update", [$serviceBooking->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="" for="name">Nama</label>
                            <input class="form-control"  readonly type="text" name="name" id="name" value="{{ old('name', $serviceBooking->name) }}">
                        </div>
                        <div class="form-group ">
                            <label class="" for="email">Email</label>
                            <input class="form-control"  readonly type="email" name="email" id="email" value="{{ old('email', $serviceBooking->email) }}">
                       </div>
                        <div class="form-group">
                            <label class="" for="phone">Telepon</label>
                            <input class="form-control"  readonly type="text" name="phone" id="phone" value="{{ old('phone', $serviceBooking->phone) }}">
                       </div>
                        <div class="form-group">
                            <label class="required" for="address">{{ trans('cruds.serviceBooking.fields.address') }}</label>
                            <textarea class="form-control"  readonly name="address" id="address" required>{{ old('address', $serviceBooking->address) }}</textarea>
                      </div>
                        <div class="form-group ">
                            <label class="" for="stylist_id">Tukang Cukur</label>
                            <select disabled class="form-control select2">
                                @foreach($stylists as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('stylist_id') ? old('stylist_id') : $serviceBooking->stylist->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @foreach($stylists as $id => $entry)
                            <input name="stylist_id" type="hidden" value="{{ $id }}" />
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label class="" for="services">Jasa</label>
                            <select disabled class="form-control select2" multiple>
                                @foreach($services as $id => $service)
                                    <option value="{{ $id }}" {{ (in_array($id, old('services', [])) || $serviceBooking->services->contains($id)) ? 'selected' : '' }}>{{ $service }}</option>
                                @endforeach
                            </select>
                            @foreach($services as $id => $service)
                                <input type="hidden" name="services[]" value="{{ $id }}"/>
                            @endforeach
                        <div class="form-group ">
                            <label class="required" for="barbershop_id">Barbershop</label>
                            <select disabled class="form-control select2">
                                @foreach($barbershops as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('barbershop_id') ? old('barbershop_id') : $serviceBooking->barbershop->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @foreach($barbershops as $id => $entry)
                            <input name="barbershop_id" type="hidden" value="{{ $id }}" />
                            @endforeach
                      </div>
                        <div class="form-group ">
                            <label class="required" for="time_book">Waktu</label>
                            <input  readonly class="form-control datetime" type="text" name="time_book" id="time_book" value="{{ old('time_book', $serviceBooking->time_book) }}">
                       </div>
                        <div class="form-group">
                            <label for="total_price">Total Harga</label>
                            <input readonly class="form-control" type="text" value="Rp. &nbsp;{{ number_format($serviceBooking->total_price) }}" step="0.01">
                            <input type="hidden" name="total_price" id="total_price" value="{{ old('total_price',$serviceBooking->total_price) }}" step="0.01">
                        </div>
                        <div class="form-group">
                            <label for="notes">Catatan</label>
                            <textarea readonly class="form-control" name="notes" id="notes">{{ old('notes', $serviceBooking->notes) }}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                              Proses
                            </button>
                            <a href="{{ route('admin.service-bookings.index') }}" class="btn btn-primary">
                              Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
var $S1 = $("select[name=stylist_id]");
var $S2 = $("select[name=barbershop_id]");
var $S3 = $("select[id=services]");

$S1.attr("readonly", "readonly");
$S2.attr("readonly", "readonly");
$S3.attr("readonly", "readonly");
</script>

@endsection

