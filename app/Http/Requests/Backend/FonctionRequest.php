<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class FonctionRequest extends FormRequest
{
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
                        'name' => 'required|max:255|unique:fonctions',
                    ];
                }
                case 'PUT':
                case 'PATCH':
                {
                    return [
                        'name' => 'required|max:255|unique:fonctions,name,'.$this->route()->fonction->id,
                    ];
                }
                default: break;
            }

    }
}
