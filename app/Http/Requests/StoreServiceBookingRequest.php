<?php

namespace App\Http\Requests;

use App\Models\ServiceBooking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreServiceBookingRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:service_bookings',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'address' => [
                'required',
            ],
            'status' => [
                'nullable',
            ],
            'stylist_id' => [
                'required',
                'integer',
            ],
            'services.*' => [
                'integer',
            ],
            'services' => [
                'required',
                'array',
            ],
            'barbershop_id' => [
                'required',
                'integer',
            ],
            'time_book' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'total_price' => [
                'required',
            ],
            'notes' => [
                'nullable',
            ],
            'status' => [
                'nullable',
            ],
        ];
    }
}