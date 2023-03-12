<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AdministrationRequest extends FormRequest
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
                ];
        
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'nom' => ['required', 'string', 'max:255'],
                    'prenom' => ['required', 'string', 'max:255'],
                    'email' => 'required|string | email| max:255 |unique:users,email,'.$this->route()->administration->id,
                ];
            }
            default: break;
        }
    }
    }

