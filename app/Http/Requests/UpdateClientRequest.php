<?php

namespace App\Http\Requests;

use App\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateClientRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('patient_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'services.*' => [
                'integer',
            ],
            'services'   => [
                'array',
            ],
            'prescriptions.*' => [
                'integer',
            ],
            'prescriptions'   => [
                'array',
            ],
        ];
    }
}
