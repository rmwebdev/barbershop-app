@extends('layouts.frontend')

@section('title', ' - Form Order')
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style>
.blue-text {
    color: #00BCD4
}

.form-control-label {
    margin-bottom: 0
}
.btn-default:hover {
    border-color: #ffc107;
    background-color: #ffc107;
    color: #fff
}

input,
textarea,
button {
    padding: 6px 12px;
    border-radius: 5px !important;
    margin: 5px 0px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    font-size: 16px !important;
    font-weight: 300
}

input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #00BCD4;
    outline-width: 0;
    font-weight: 400
}

.btn-block {
    text-transform: uppercase;
    font-size: 18px !important;
    font-weight: 400;
    height: 60px;
}

/* .btn-block:hover {
    color: #fff !important
} */
textarea { height: auto !important; }
button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}
.form-card{
    padding: 1rem;
}

.select2-selection__rendered {
    line-height: 34px !important;
    font-weight: 300
}
.select2-container .select2-selection--single {
    height: 35px !important;
    font-size: 14px !important;
    font-weight: 300
}
.select2-selection__arrow {
    height: 39px !important;
    font-weight: 300
}

label.check {
    cursor: pointer
}

label.check input {
    position: absolute;
    top: 0;
    left: 0;
    visibility: hidden;
    pointer-events: none
}

label.check span {
    padding: 7px 14px;
    border: 2px solid #ffc107;
    display: inline-block;
    color: #fff;
    border-radius: 3px;
    /* text-transform: uppercase */
}

label.check input:checked+span {
    border-color: #ffc107;
    background-color: #ffc107;
    color: #fff
}

</style>
@endsection
@section('content')

        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Order Jasa Kami Disini</h2>
                    </div>
                    <div class="col-12">
                        <a href="/">Beranda</a>
                        <a href="#">Order Jasa</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        <div class="section-header text-center" style="margin-top: 90px;">
                    <p>Order Jasa</p>
                    <h2>POrder Jasa Kami Disini</h2>
                </div>
        </div>
        <div class="contact">
            <div class="container-fluid">
                <div class="container" style="padding: 1rem">
                    <div class="row align-items-center" style="border: 1px solid #fff;">
                        <div class="col-md-12">
                            <form class="form-card" id="SubmitForm" method="POST" action="{{ route("order-detail.store") }}">
                                    @csrf
                                <div class="row justify-content-center text-left">
                                    <div class="col-sm-12">
                                         <button type="button" disabled class="btn-block btn-warning text-left mb-2 mt-2">Detail Pemesan</button> 
                                    </div>
                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-6 {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label class="required" for="name">Nama</label>
                                        <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required placeholder="Masukan nama anda">
                                        @if($errors->has('name'))
                                            <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-6 {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <label class="required" for="email">Email</label>
                                        <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required placeholder="Masukan email anda">
                                        @if($errors->has('email'))
                                            <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group col-sm-6 {{ $errors->has('phone') ? 'has-error' : '' }}">
                                        <label class="required" for="phone">Telepon</label>
                                        <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required placeholder="Masukan no telepon anda">
                                        @if($errors->has('phone'))
                                            <span class="help-block" role="alert">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-6 {{ $errors->has('address') ? 'has-error' : '' }}">
                                        <label class="required" for="address">Alamat</label>
                                        <textarea class="form-control" name="address" id="address" required placeholder="Masukan alamat anda">{{ old('address') }}</textarea>
                                        @if($errors->has('address'))
                                            <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Data order -->

                                <div class="row justify-content-center text-left">
                                    <div class="col-sm-12">
                                         <button type="button" disabled class="btn-block btn-warning text-left mb-2 mt-2">Detail Order</button> 
                                    </div>
                                </div>

                                <div class="row justify-content-between text-left">
                               
                                    <div class="col-sm-6 flex-column d-flex" id="detail-order">
                                    <small class="text-italic text-danger" id="text-info">Lengkapi data dulu baru order!</small>

                                        <div class="form-group {{ $errors->has('barbershop') ? 'has-error' : '' }}">
                                            <label class="required" for="barbershop_id">Barbershop</label>
                                            <select class="form-control select2" name="barbershop_id" id="barbershop_id" required>
                                                @foreach($barbershops as $id => $entry)
                                                    <option value="{{ $id }}">{{ $entry }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('barbershop'))
                                                <span class="help-block" role="alert">{{ $errors->first('barbershop') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group {{ $errors->has('stylist') ? 'has-error' : '' }}">
                                            <label class="required" for="stylist_id">Tukang Cukur</label>
                                            <select class="form-control select2" name="stylist_id" id="stylist_id" required>
                                                <option value="">Pilih Tukang Cukur</option>
                                            </select>
                                            @if($errors->has('stylist'))
                                                <span class="help-block" role="alert">{{ $errors->first('stylist') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group {{ $errors->has('services') ? 'has-error' : '' }}">
                                            <label class="required" for="services">Jasa Service</label>
                                            <div class="centered" id="servicesOption">
                                                <label class="check"> 
                                                    <!-- <input type="checkbox" checked disabled>  -->
                                                <span>Pilih barbershop dulu</span> 
                                                </label> 
                                             </div>
                                            @if($errors->has('services'))
                                                <span class="help-block" role="alert">{{ $errors->first('services') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group {{ $errors->has('time_book') ? 'has-error' : '' }}">
                                            <label class="required" for="time_book">Waktu</label>
                                            <input class="form-control datetime" type="text" name="time_book" id="time_book" value="{{ old('time_book') }}" required placeholder="Pilih waktu">
                                            @if($errors->has('time_book'))
                                                <span class="help-block" role="alert">{{ $errors->first('time_book') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
                                            <label for="text">Catatan</label>
                                            <textarea class="form-control" name="notes" id="notes" placeholder="Masukan catatan anda">{{ old('notes') }}</textarea>
                                            @if($errors->has('notes'))
                                                <span class="help-block" role="alert">{{ $errors->first('notes') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Detai bayar -->
                                    <div class="col-sm-6 flex-column d-flex">
                                        <div class="mb-4">
                                            <ul class="list-group mb-3 mt-2">
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                <div>
                                                    <h6 class="my-0">Belum ada order</h6>
                                                </div>
                                                </li>
                                            </ul>
                                            <div class="list-group-item d-flex justify-content-between text-success">
                                                    <span>Total Bayar</span>
                                                    <strong>Rp. &nbsp; <b class="priceTotal">0</b></strong>
                                                    <input type="hidden" name="total_price" id="total_price">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                <div class="row justify-content-start">
                                    <div class="form-group col-sm-6"> 
                                        <button id="btn-submit" type="submit" class="btn-block btn-primary">Order Sekarang</button> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


        <!-- Video Modal Start-->
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" onclick="closeModal()"  aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>        
                        <!-- 16:9 aspect ratio -->
                        <div class="embed-responsive border">
                           
                        </div>
                        <div class="text-center">
                        <button type="button" class="btn btn-default me-2" onclick="closeModal()">Selesai</button>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div> 
        <!-- Video Modal End -->
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@parent
<script>
 $( document ).ready(function() {
    //  $('#form-order').trigger("reset");
    $('#confirmModal').modal({show: false, backdrop: 'static', keyboard: false});
     var email = $('#email').val()
    checkData(email);
    $("#detail-order :input").attr("disabled", true);
    $("#text-info").attr("show", true);
});
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
 $("#barbershop_id").change(function(){
    $.ajax({
                url: "{{ route('get-data-form-order') }}?barbershop_id=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#stylist_id').html(data.stylists);  
                    $('#servicesOption').html(data.services);
                    console.log(data)
                }
            });
       
});
$("#email").on('change' , function(){
    var email = $('#email').val()
    checkData(email);
    if(email !== ''){
        $("#detail-order :input").attr("disabled", false);
        $("#text-info").attr("hidden", true);
    }
})
function closeModal(){
    $('#confirmModal').modal({show: false, backdrop: 'static', keyboard: false});
}
function checkService(id, price){
    var html =''
    var order_code = $('#email').val();
    if($("#services_"+id).is(":checked")) {
        var service_name = $("#span_"+id).text();
        $.ajax({
                url: "{{ route('service-temps.store') }}",
                method: 'POST',
                data: {
                    ids: id,
                    order_code: order_code,
                    price: price,
                    service_name: service_name
                },
                success: function(data) {
                if(data.orderList){
                    $('.list-group').html(data.orderList);
                    $('.priceTotal').html(data.totalBayar);
                    $('#total_price').val(data.priceCount);
                    }
                }
            });

    } else {
        $.ajax({
                url: "{{ route('service-temps.destroy') }}",
                method: 'DELETE',
                data: {
                    ids: id,
                    order_code: order_code
                },
                success: function(data) {
                if(data.orderList){
                    $('.list-group').html(data.orderList);
                    $('.priceTotal').html(data.totalBayar);
                    $('#total_price').val(data.priceCount);
                    }
                }
            });

    }
}

function checkData(email) {
    
        $.ajax({
                url: "{{ route('service-temps-temp.delete') }}",
                method: 'DELETE',
                data:{
                    order_code: email
                },
                success: function(data) {
                console.log(data)
                }
            });
   }


// $('#SubmitForm').on('submit',function(e){
//     var form = '';
//     e.preventDefault();
//     form = {
//         name: $('#name').val(),
//         email: $('#email').val(),
//         phone: $('#phone').val(),
//         address: $('#address').val(),
//         barbershop_id: $('#barbershop_id').val(),
//         stylist_id: $('#stylist_id').val(),
//         services: $("input[name='services[]']").map(function(){return $(this).val();}).get(),
//         time_book: $('#time_book').val(),
//         notes: $('#notes').val(),
//         total_price: $('#total_price').val(),
//     }
//     console.log(form);
    
//     $.ajax({
//       url: "{{ route("order-detail.store") }}",
//       type:"POST",
//       data: form,
//       success:function(response){
//         window.location.href = "{{ route('welcome')}}"
//         // $('.embed-responsive border').html('tester')
//         // $('#confirmModal').modal({show: true, backdrop: 'static', keyboard: false});
//         console.log(response);
//       },
//       error: function(response) {
//           console.log(response.errors)
//           window.location.href = "{{ route('welcome')}}"
//         //   $('.embed-responsive border').html('tester')
//         //   $('#confirmModal').modal({show: true, backdrop: 'static', keyboard: false});
//       },
//       });
//     });
</script>
@endsection

