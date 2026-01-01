<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storTikController extends FormRequest
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
            'name'=>'required|string',
            'quty'=>'required|integer|min:4|max:10',
            'price'=>'required|integer',
            // 'user_id'=>'required|exists:users,id',
            'id_event' => 'required|exists:events,id'

        ];
    }
}
