<?php

namespace App\Http\Requests;

use App\Models\ServiceBooking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateServiceBookingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_booking_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
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