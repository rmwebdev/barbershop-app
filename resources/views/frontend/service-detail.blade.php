@extends('layouts.frontend')
@section('title', ' - Katalog Jasa')
@section('content')
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>{{$service->name}}</h2>
                    </div>
                    <div class="col-12">
                    <a href="{{route('welcome')}}">Beranda</a>
                        <a href="{{ route('services')}}">Katalog Jasa</a>
                        <a href="#" style="color:white !important">{{$service->name}}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Single Page Start -->
        <div class="single  price team blog">
            <div class="container">
                <div class="section-header text-center">
                    <h2>{{$service->name}}</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        @if($service->cover_img)
                        <a href="{{ $service->cover_img->getUrl() }}" target="_blank" style="display: inline-block">
                        <img src="{{ $service->cover_img->getUrl('previewXl') }}">
                        </a>
                        @else 
                        <img src="{{ asset('assets/img/single.jpg')}}" alt="Image">
                        @endif
                            <h1>{{$service->name}}</h1>
                            <button disabled class="btn btn-primary">Rp. &nbsp{{ number_format($service->price) }}</button>
                            <p>  {{$service->desc}} </p>  
                    </div>
                </div>
                @if(count($barbershops) > 0 )
                <div class="row service">
                    <div class="col-12"> 
                    <h1>{{$service->name}} tersedia di Barbeshop di bawah</h1>
                    </div>   
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
                @endif 
        </div>

@endsection
@section('scripts')
@parent

@endsection

