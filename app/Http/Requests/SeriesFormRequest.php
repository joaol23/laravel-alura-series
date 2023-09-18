<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "O campo nome é obrigatório",
            'name.min' => "O campo nome precisa de :min characteres", 
        ];
    }
}
