<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCourseRequest extends FormRequest
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
                "title" => 'required|min:10|max:30',
                "description" => 'required|min:10',
                "weeks" => 'required|max:1',
                "enroll_cost" => 'numeric|required',
                "minimum_skill" => 'required|in:Beginer,Advance,Expert,Intermediate',
            ];  
    }

    public function messages()
    {
        return [
            'title.required' => 'Titulo obligatorio',
            'title.min' => 'Minimo 10 caracteres',
            'title.max' => 'Maximo 30 caracteres',
            'description.required' => 'Obligatorio',
            'description.min' => 'Minimo 10 caracteres',
            'weeks.required' => 'Obligatorio',
            'weeks.max' => 'Maximo 9 semanas',
            'enroll_cost.numeric' => 'Solo se aceptan numeros',
            'minimum_skill.required' => 'Obligatorio',
            'minimum_skill.in' => 'Solo acepta los campos Beginer Advance Expert e Intermediate'
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
