<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyServiceBookingRequest;
use App\Http\Requests\StoreServiceBookingRequest;
use App\Http\Requests\UpdateServiceBookingRequest;
use App\Models\Barbershop;
use App\Models\Service;
use App\Models\ServiceBooking;
use App\Models\Stylist;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServiceBookingController extends Controller
{
    public function index()
    {

        $serviceBookings = ServiceBooking::with(['stylist', 'services', 'barbershop'])->get();

        return view('admin.serviceBookings.index', compact('serviceBookings'));
    }

    public function create()
    {

        $stylists = Stylist::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $services = Service::pluck('name', 'id');

        $barbershops = Barbershop::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.serviceBookings.create', compact('barbershops', 'services', 'stylists'));
    }

    public function store(StoreServiceBookingRequest $request)
    {
        
        $serviceBooking = ServiceBooking::create($request->all());
        $serviceBooking->services()->sync($request->input('services', []));

        return redirect()->route('admin.service-bookings.index');
    }

    public function edit(ServiceBooking $serviceBooking)
    {

        $stylists = Stylist::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $services = Service::pluck('name', 'id');

        $barbershops = Barbershop::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $serviceBooking->load('stylist', 'services', 'barbershop');

        return view('admin.serviceBookings.edit', compact('barbershops', 'serviceBooking', 'services', 'stylists'));
    }

    public function update(UpdateServiceBookingRequest $request, ServiceBooking $serviceBooking)
    {
        $request->request->add(['status' => 'Confirmed']);
        $serviceBooking->update($request->all());
        $serviceBooking->services()->sync($request->input('services', []));

        return redirect()->route('admin.service-bookings.index');
    }

    public function show(ServiceBooking $serviceBooking)
    {

        $serviceBooking->load('stylist', 'services', 'barbershop');

        return view('admin.serviceBookings.show', compact('serviceBooking'));
    }

    public function destroy(ServiceBooking $serviceBooking)
    {

        $serviceBooking->delete();

        return back();
    }
}