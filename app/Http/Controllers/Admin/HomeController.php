<?php

namespace App\Http\Controllers\Admin;

use App\Models\Barbershop;
use App\Models\Service;
use App\Models\ServiceBooking;
use App\Models\Stylist;
use Log;

class HomeController
{
    public function index()
    {
        $barber = [
            'barbershop'  => Barbershop::count(),
            'stylist' => Stylist::count(),
            'jasa' => Service::count(),
            'orders' => ServiceBooking::count(),
            'order' => ServiceBooking::where('status', '=' ,'Proses')->count()
        ];   
        $serviceBookings = ServiceBooking::where('status','=','Proses')->with(['stylist', 'services', 'barbershop'])->get();
        return view('home',compact(['serviceBookings','barber']));
    }
}