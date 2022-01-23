<?php

namespace App\Http\Requests;

use App\Models\Stylist;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStylistRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stylist_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'thumb' => [
                'string',
                'nullable',
            ],
        ];
    }
}