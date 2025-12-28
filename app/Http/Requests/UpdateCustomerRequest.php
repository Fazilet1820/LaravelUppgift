<?php

namespace App\Http\Requests;

use App\Enums\CustomerKind;
use App\Enums\MembershipType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // $this->customerId Livewire'dan gelecek
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('customers', 'email')->ignore($this->customerId),
            ],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:500'],
            'date_of_birth' => ['nullable', 'date', 'before:today'],
            'membership_type' => ['required', Rule::enum(MembershipType::class)],
            'customer_kind' => ['required', Rule::enum(CustomerKind::class)],
            'is_active' => ['boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Namn är obligatoriskt.',
            'name.min' => 'Namn måste vara minst 3 tecken.',
            'email.required' => 'E-post är obligatorisk.',
            'email.unique' => 'Denna e-post används redan.',
            'phone.required' => 'Telefon är obligatorisk.',
            'address.required' => 'Adress är obligatorisk.',
        ];
    }
}
