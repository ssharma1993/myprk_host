<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $phone = (string) $this->input('phone', '');

        // Keep leading +, remove spaces, dashes, brackets and dots.
        $normalized = preg_replace('/(?!^\+)\D+/', '', trim($phone));

        $this->merge([
            'phone' => $normalized,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            // E.164-like format: optional +, 8 to 15 digits.
            'phone' => ['required', 'string', 'regex:/^\+?[1-9]\d{7,14}$/'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your name.',
            'name.string' => 'Name must be text.',
            'name.max' => 'Name cannot exceed 255 characters.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email cannot exceed 255 characters.',
            'phone.required' => 'Please enter your phone number.',
            'phone.string' => 'Phone number must be text.',
            'phone.regex' => 'Please enter a valid mobile number (example: +14165551234).',
            'message.required' => 'Please enter your message.',
            'message.string' => 'Message must be text.',
            'message.min' => 'Message must be at least 10 characters.',
            'message.max' => 'Message cannot exceed 5000 characters.',
        ];
    }
}