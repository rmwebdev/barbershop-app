<?php

namespace App\Http\Requests;

use App\Models\Barbershop;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBarbershopRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('barbershop_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:barbershops,name,' . request()->route('barbershop')->id,
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