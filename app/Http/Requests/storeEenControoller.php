<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeEenControoller extends FormRequest
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
    public function store(): array
    {
        return [
            'name'=>'required|string|max:255',
            'description'=>'required|',
            'date_start'=>'required|date',
            'date_end'=>'required|date',
            'place'=>'required|string',
            'id_tick'=>'required|exist:tickets,id'
        ];
    }
}
