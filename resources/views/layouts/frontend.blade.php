<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $settings->web_name ?? '' }} @yield('title')</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="{{ $settings->web_name ?? '' }}" name="keywords">
        <meta content="{{ $settings->web_name ?? '' }}" name="description">

        <!-- Favicon -->
        <link href="{{asset('assets/img/favicon.ico')}}" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
        <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

        @yield('styles')
        <!-- Template Stylesheet -->
        <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
        
    </head>

    <body>
                <!-- Top Bar Start -->
        <div class="top-bar d-none d-md-block">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="top-bar-left">
                            <div class="text">
                                <h2>{{ $settings->open_hours ?? '8:00 - 19:00' }}</h2>
                                <p>Buka  Senin - Minggu</p>
                            </div>
                            <div class="text">
                                <h2>{{ $settings->phone ?? '1234567890' }}</h2>
                                <p>Telepon untuk booking</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="top-bar-right">
                            <div class="social">
                                        <a target="_blank" href="{{ $settings->twitter  ?? ''}}"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="{{ $settings->facebook  ?? ''}}"><i class="fab fa-facebook-f"></i></a>
                                        <a target="_blank" href="{{ $settings->intagram  ?? ''}}"><i class="fab fa-instagram"></i></a>
                                        <a target="_blank" href="{{ $settings->linkind  ?? ''}}"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a href="{{route('welcome')}}" class="navbar-brand">{{ $settings->web_name ?? '' }}</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="{{route('welcome')}}" class="nav-item nav-link {{ request()->is('welcome') || request()->is('/') ? 'active': ''}}">Home</a>
                        <a href="{{route('gerai')}}" class="nav-item nav-link {{ request()->is('gerai') || request()->is('gerai/*') ? 'active': ''}}">Gerai</a>
                        <a href="{{route('services')}}" class="nav-item nav-link {{ request()->is('services') || request()->is('services/*') ? 'active': ''}}">Jasa Service</a>
                        <a href="{{route('order-now')}}" class="ml-4 btn btn-warning nav-item nav-link {{ request()->is('order-now') || request()->is('order-now/*') ? 'order-now': ''}}">Order Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->
    @yield('content')



    <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="footer-contact">
                                    <h2>Alamat</h2>
                                    <p><i class="fa fa-map-marker-alt"></i>{{ $settings->address  ?? ''}}</p>
                                    <p><i class="fa fa-phone-alt"></i>{{ $settings->phone  ?? ''}}</p>
                                    <p><i class="fa fa-envelope"></i>{{ $settings->email  ?? ''}}</p>
                                    <div class="footer-social">
                                        <a target="_blank" href="{{ $settings->twitter  ?? ''}}"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="{{ $settings->facebook  ?? ''}}"><i class="fab fa-facebook-f"></i></a>
                                        <a target="_blank" href="{{ $settings->intagram  ?? ''}}"><i class="fab fa-instagram"></i></a>
                                        <a target="_blank" href="{{ $settings->linkind  ?? ''}}"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="footer-link">
                                    <h2>Menu</h2>
                                    <a href="{{ route('gerai') }}">Gerai</a>
                                    <a href="{{ route('services') }}">Jasa Service</a>
                                    <a href="{{ route('order-now') }}">Pesan Jasa Kami</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container copyright">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; <a href="#">{{ $settings->web_name  ?? ''}}</a>, All Right Reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <p>Designed By <a href="/">{{ $settings->web_name  ?? ''}} team</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script>
           @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;

                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;

                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;

                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
            @endif
    </script>

    @yield('scripts')
    </body>
</html>