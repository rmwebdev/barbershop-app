@extends('layouts.frontend')
@section('title', ' - Gerai')
@section('content')

        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Gerai {{ $settings->web_name ?? "Barbershop x"}}</h2>
                    </div>
                    <div class="col-12">
                        <a href="{{route('welcome')}}">Beranda</a>
                        <a href="#" style="color:white !important">Gerai Kami</a>
                    </div>
                </div>
            </div>
        </div>
        @if(count($barbershops) > 0 )
        <div class="service">
            <div class="container">
                <div class="section-header text-center">
                    <p>Gerai Barbershop</p>
                    <h2>Gerai {{ $settings->web_name ?? "Barbershop x"}}</h2>
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
                            <h3>{{ $barbershop->name}}</h3>
                            <p>
                            {{$barbershop->address}}
                            </p>
                        <div class="blog-text" style="position: absolute; right:0; bottom:0; left: 0;" >
                            <a class="btn" href="{{ route('gerai.detail', $barbershop->slug)}}">Lihat Detail <i class="fa fa-angle-right"></i></a>
                        </div>
                        </div>
                         
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        {{ $barbershops->links('pagination') }}
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="service section-header text-center">
            <h4>Tidak ada gerai barbershop saat ini</h4>
        </div>
        @endif
        <!-- Service End -->

@endsection
@section('scripts')
@parent

@endsection

