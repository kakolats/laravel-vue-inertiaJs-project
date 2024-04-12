<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChapterRequest extends FormRequest
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
            'title' => ['required','min:5','max:100'],
            'description' => 'required|min:10|max:500',
            'published' => ''
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => "Le titre est obligatoire",
            'title.min' => "Le titre doit contenir au moins 5 caractères",
            'title.max' => "Le titre doit contenir au maximum 100 caractères",
            'description.required' => "La description est obligatoire",
            'description.min' => "La description doit contenir au moins 10 caractères",
            'description.max' => "La description doit contenir au maximum 500 caractères"
        ];
    }
}
