<?php

namespace Lacomita\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserGuardarRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
       $reglas = [
            'fullname' => 'required|min:5|max:50',
            'cedula' => 'required|min:5|max:12',
            'telefono' => 'required|min:5|max:12',
            'email' => 'unique:users,email',
            'password' => 'required|min:5',
            'tipo' => 'required',
        ];
        if($this->method() !== 'POST'){
            $reglas = [
                'fullname' => 'required',
                'cedula' => 'required',
                'telefono' => 'required',
                'tipo' => 'required',
            ];
        }

        return $reglas;
    }
    public function messages()
    {
        return [
            'fullname.required' => 'El nombre completo debe ser obligatorio.',
            'cedula.required' => 'La cédula de identidad debe ser obligatorio.',
            'telefono.required' => 'El teléfono debe ser obligatorio.',
        ];
    }
}
