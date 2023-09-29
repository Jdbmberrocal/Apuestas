<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquiposRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string',
            'pais' => 'required|string',
            'ciudad' => 'required|string',
            'estadio' => 'required|string',
            'fundacion' => 'required|date'
        ];
    }


    public function messages(): array
    {
        return [
            // 'nombre.required' => 'A title is required',
            // 'ciudad.required' => 'A message is required',
        ];
    }
}
