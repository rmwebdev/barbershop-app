<?php

namespace App\Http\Requests;

use App\Models\Service;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:services,name,' . request()->route('service')->id,
            ],
            'desc' => [
                'required',
            ],
            'price' => [
                'required',
            ],
        ];
    }
}