<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProdiRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fakultas_id' => 'required|exists:fakultas,id',
            'nama_prodi' => 'required|min:3',
            'nama_kaprodi' => 'required|min:3',
            'photo_kaprodi' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:1024'
        ];
    }
}
