<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ContratRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'type' => 'required|max:255',
                    'salaire' => 'required|numeric|',
                    'date_d' => 'required|date_format:Y-m-d|before:date_f',
                    'date_f' => 'required|date_format:Y-m-d',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'type' => 'required|max:255',
                    'salaire' => 'required|numeric|',
                    'date_d' => 'required|date_format:Y-m-d|before:date_f',
                    'date_f' => 'required|date_format:Y-m-d',
                ];
            }
            default: break;
        }
    }
}
