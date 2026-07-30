<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'service' => 'nullable|string|max:255',
            'budget' => 'nullable|string|max:100',
            'timeline' => 'nullable|string|max:100',
            'message' => 'required|string',
        ];
    }
}
