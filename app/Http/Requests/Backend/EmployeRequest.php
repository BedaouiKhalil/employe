<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class EmployeRequest extends FormRequest
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
                    'nom' => ['required', 'string', 'max:255'],
                    'prenom' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8'],
                    'date_naissance'=>'required|date_format:Y-m-d|before:date_r',
                    'date_r'=>'required|date_format:Y-m-d',
                    'diplome'=>'required',
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
                    'nom' => ['required', 'string', 'max:255'],
                    'prenom' => ['required', 'string', 'max:255'],
                    'email' => 'required|string | email| max:255 |unique:users,email,'.$this->route()->employe->user_id,
                    'date_naissance'=>'required|date_format:Y-m-d|before:date_r',
                    'date_r'=>'required|date_format:Y-m-d',
                    'diplome'=>'required',
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
