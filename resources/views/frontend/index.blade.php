@extends('layouts.frontend')
@section('title', ' - Beranda')
@section('content')
        <!-- Hero Start -->
        <div class="hero">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="hero-text">
                            <h1>{{ $setting->tag_line ?? 'Contoh Motto Anda'}}</h1>
                            <p>
                            {{ $setting->paragraf_tag_line ?? 'Description motto'}}
                            </p>
                            <a class="btn" href="{{ route('order-now') }}">Order Sekarang</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 d-none d-md-block">
                        <div class="hero-image" style="margin-top: 5rem;">
                            <img src="assets/img/hero.png" alt="Hero Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->    
        <!-- About Start -->
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6">
                        <div class="about-img">

                        <!-- <img src="assets/img/about.jpg" alt="Image"> -->
                                @if($setting->about_image)
                                    <a href="{{ $setting->about_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $setting->about_image->getUrl('preview') }}">
                                </a>
                                @else 
                                <img src="assets/img/about.jpg" alt="Image">
                                @endif
                           
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="section-header text-left">
                        <p>Tentang Kami</p>
                        <h2>{{ $setting->web_name ?? 'Nama Website'}}</h2>
                        </div>
                        <div class="about-text">
                            @if($setting !== null && $setting->about_web !== '')
                            <p>
                            {!! $setting->about_web !!}</p>
                            @else
                            <p>
                            Tentang Website anda
                            </p>
                            @endif
                            
                            <a class="btn" href="{{route('gerai')}}">Kunjungi barbershop kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Service Start 3 -->
        @if(count($barbershops) > 0 )
        <div class="service">
            <div class="container">
                <div class="section-header text-center">
                    <p>Gerai Barbershop</p>
                    <h2>Gerai Barbershop x</h2>
                </div>
                <div class="row">
                    @foreach($barbershops as $barbershop)
                    <div class="col-lg-4 col-md-6">
                            <div class="service-item" style="height:635px;" style="position:relative;">
                                <div class="service-img">
                                    @if($barbershop->photo)
                                    <a href="{{ $barbershop->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $barbershop->photo->getUrl('preview') }}">
                                    </a>
                                    @else
                                    <img src="assets/img/blog-2.jpg" alt="Blog">
                                    @endif
                                </div>
                                <h2>{{$barbershop->name}}</h2>
                                    <p>{{ substr($barbershop->about_barber, 0, 100)}} ...</p>
                                <div class="blog-text" style="position: absolute; right:0; bottom:0; left: 0;" >
                                    <a class="btn" href="{{ route('gerai.detail', $barbershop->slug)}}">Lihat Detail <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif


        <!-- services -->

        @if(count($services) > 0 )
        <div class="service price">
            <div class="container">
                <div class="section-header text-center">
                    <p>Katalog Jasa</p>
                    <h2>Jasa {{ $setting->web_name ?? 'Nama Website'}}</h2>
                </div>
                <div class="row">
                    @foreach($services as $service)
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
            </div>
        </div>
        @endif


        <!-- Team Start 4 -->

        @if(count($stylists) > 0 )
        <div class="service team">
            <div class="container">
                <div class="section-header text-center">
                    <p>Team {{ $setting->web_name ?? 'Nama Website'}}</p>
                    <h2>Team Terbaik Kami</h2>
                </div>
                <div class="row">
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
            </div>
        </div>
        @endif

@endsection
@section('scripts')
@parent

@endsection

