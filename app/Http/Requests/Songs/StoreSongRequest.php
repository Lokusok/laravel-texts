<?php

namespace App\Http\Requests\Songs;

use Illuminate\Foundation\Http\FormRequest;

class StoreSongRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'quatrain_1' => ['required', 'string'],
            'quatrain_2' => ['required', 'string'],
            'quatrain_3' => ['required', 'string'],
            'order_1' => ['required', 'numeric'],
            'order_2' => ['required', 'numeric'],
            'order_3' => ['required', 'numeric'],
        ];
    }
}
