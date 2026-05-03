<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O nome do jogo é obrigatório',
            'name.string' => 'O nome do jogo deve ser uma string',
            'name.max' => 'O nome do jogo não pode ter mais de 255 caracteres',
            'release_date.date' => 'A data de lançamento deve ser uma data válida',
            'genre.string' => 'O gênero deve ser uma string',
            'genre.max' => 'O gênero não pode ter mais de 100 caracteres',
            'publisher.string' => 'O editor deve ser uma string',
            'publisher.max' => 'O editor não pode ter mais de 255 caracteres',
            'is_multiplayer.boolean' => 'A flag de multiplayer deve ser um booleano',
            'is_favorite.boolean' => 'A flag de favorito deve ser um booleano',
            'description.string' => 'A descrição deve ser uma string'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'release_date' => 'nullable|date',
            'genre' => 'nullable|string|max:100',
            'publisher' => 'nullable|string|max:255',
            'is_multiplayer' => 'boolean',
            'is_favorite' => 'boolean',
            'description' => 'nullable|string'
        ];
    }
}
