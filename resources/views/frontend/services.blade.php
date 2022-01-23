@extends('layouts.frontend')
@section('title', ' - Katalog Jasa')
@section('content')

        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Katalog Jasa</h2>
                    </div>
                    <div class="col-12">
                        <a href="{{route('welcome')}}">Beranda</a>
                        <a href="#" style="color:white !important">Katalog Jasa</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

         <!-- Service Start 3 -->
         @if(count($services) > 0 )
        <div class="service">
            <div class="container">
                <div class="section-header text-center">
                    <p>Katalog Jasa</p>
                    <h2>Penawaran Terbaik Dari Kami</h2>
                </div>
                <div class="row">
                    @foreach($services as $service)
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item" style="height:635px;" style="position:relative;">
                            <div class="service-img">
                                @if($service->photo)
                                    <a href="{{ $service->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $service->photo->getUrl('preview') }}">
                                    </a>
                                    @else
                                     <img src="assets/img/blog-2.jpg" alt="Blog">
                                @endif
                            </div>
                            <h3>{{ $service->name}}</h3>
                            <p>
                                {{ substr($service->desc, 0, 200)}}{{ '...'}}
                            </p>
                        <div class="blog-text" style="position: absolute; right:0; bottom:0; left: 0;" >
                            <a class="btn" href="{{ route('services.detail', $service->slug)}}">Lihat Detail <i class="fa fa-angle-right"></i></a>
                        </div>
                        </div>
                         
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        {{ $services->links('pagination') }}
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="service section-header text-center">
            <h4>Tidak ada gerai service saat ini</h4>
        </div>
        @endif
        <!-- Service End -->


@endsection
@section('scripts')
@parent

@endsection