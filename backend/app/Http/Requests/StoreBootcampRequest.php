<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreBootcampRequest extends FormRequest{
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
        return [
            "name" => 'required|min:5',
            "user_id" => 'required|exists:users,id'
        ];   
    }

    public function messages()
{
    return [
        'name.required' => 'Nombre obligatorio',
        'name.min' => 'Minimo 5 caracteres',
        'user_id.exists' => 'Obligatorio'
    ];
}

    //enviar response con errores de validacion
    protected function failedValidation(Validator $v){
        //si la validacion es fallida se lanza un Http
        throw new HttpResponseException(
            response()->json(["success"=>false,
                                        "errors" => $v->errors(),    

        ],422)
    );
    }
}
