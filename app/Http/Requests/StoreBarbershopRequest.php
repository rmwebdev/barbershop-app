<?php

namespace App\Http\Requests;

use App\Models\Barbershop;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBarbershopRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('barbershop_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:barbershops',
            ],
            'address' => [
                'required',
            ],
            'about_barber' => [
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'services.*' => [
                'integer',
            ],
            'services' => [
                'required',
                'array',
            ],
        ];
    }
}