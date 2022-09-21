<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreReviewRequest extends FormRequest
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
            return [
                "title" => 'required|max:20',
                "text" => 'required|max:50',
                "rating" => 'numeric|required',
                "bootcamp_id" => 'required|exists:bootcamps,id',
                "user_id" => 'required|exists:users,id'
            ]; 
    }

    public function messages()
    {
        return [
            'title.required' => 'Titulo obligatorio',
            'title.max' => 'Maximo 20 caracteres',
            'text.required' => 'Obligatorio',
            'text.max' => 'Maximo 50 caracteres',
            'rating.numeric' => 'Solo se aceptan numeros',
            'rating.required' => 'Obligatorio',
            'bootcamp_id.exists' => 'Obligatorio',
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
