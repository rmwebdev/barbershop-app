<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barbershop;
use App\Models\Service;
use App\Models\ServiceBooking;
use App\Models\Stylist;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $serviceBookings = ServiceBooking::with(['stylist', 'services', 'barbershop'])->get();
        return view('home',compact('serviceBookings'));
    }
}