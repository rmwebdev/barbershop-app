@extends('layouts.frontend')
@section('title', ' - Gerai')
@section('content')

        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>{{$barbershop->name}}</h2>
                    </div>
                    <div class="col-12">
                    <a href="{{route('welcome')}}">Beranda</a>
                        <a href="{{ route('gerai')}}">Gerai Kami</a>
                        <a href="#" style="color:white !important">{{$barbershop->name}}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Single Page Start -->
        <div class="single  price team">
            <div class="container">
                <div class="section-header text-center">
                    <h2>{{$barbershop->name}}</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        @if($barbershop->cover_img)
                        <a href="{{ $barbershop->cover_img->getUrl() }}" target="_blank" style="display: inline-block">
                        <img src="{{ $barbershop->cover_img->getUrl('previewXl') }}">
                        </a>
                        @else 
                        <img src="{{ asset('assets/img/single.jpg')}}" alt="Image">
                        @endif
                            <h1>{{$barbershop->name}}</h1>
                            
                            <p>
                            {{$barbershop->about_barber}} </p>
                            
                    </div>
                
                </div>

                <!-- services -->
                @if(count($barbershop->services) > 0 )
                <div class="row">
                    <div class="col-12">
                    <h1>{{$barbershop->name}} Services</h1>
                    </div>
                    @foreach($barbershop->services as $key => $service)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="price-item" style="height: 122px;">
                            <div class="price-img">
                                @if($service->cover_img)
                                <a href="{{ $service->cover_img->getUrl() }}" target="_blank" style="display: inline-block">
                                <img src="{{ $service->cover_img->getUrl('preview') }}">
                                </a>
                                @else 
                                <img src="{{ asset('assets/img/price-1.jpg') }}" alt="Image">
                                @endif
                            </div>
                            <div class="price-text">
                                <h2>{{$service->name}}</h2>
                                <h3>Rp.&nbsp;{{number_format($service->price)}}</h3>
                            </div>
                        </div>
                    </div> 
                    @endforeach   
                </div>
                @endif

                <!-- teams -->
                @if(count($stylists) > 0 )
                <div class="row">
                    <div class="col-12">
                    <h1>{{$barbershop->name}} Team</h1>
                    </div>
                    @foreach($stylists as $stylist)
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                @if($stylist->thumb)
                                <a href="{{ $stylist->thumb->getUrl() }}" target="_blank" style="display: inline-block">
                                <img src="{{ $stylist->thumb->getUrl('preview') }}">
                                </a>
                                @else 
                                <img src="{{ asset('assets/img/team-1.jpg') }}" alt="Team Image">
                                @endif
                                
                            </div>
                            <div class="team-text">
                                <h2>{{$stylist->name}}</h2>
                                <p>{{$stylist->skills}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>          
    </div>
        <!-- Single Page End -->



@endsection
@section('scripts')
@parent

@endsection

