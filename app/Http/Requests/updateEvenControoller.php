<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateEvenControoller extends FormRequest
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
    public function update(): array
    {
        return [
            'name'=>'sometime|string|max:20',
            'description'=>'sometime|string',
            'date_start'=>'sometime|date',
            'date_end'=>'sometime|date',
            'place'=>'sometime|string',
            'id_tick'=>'required|exists:tickets,id'
        ];
    }
}
