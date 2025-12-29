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
        // Livewire'dan customerId gelecek
        $customerId = $this->input('customerId') ?? $this->route('customer')?->id;

        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('customers', 'email')->ignore($customerId),
            ],
            'phone' => ['required', 'regex:/^\+?[0-9\s]{7,20}$/', 'max:20'],
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
            'email.email' => 'Ange en giltig e-postadress.',
            'email.unique' => 'Denna e-post används redan.',
            'phone.required' => 'Telefon är obligatorisk.',
            'phone.max' => 'Telefon får inte vara längre än 20 tecken.',
            'address.required' => 'Adress är obligatorisk.',
            'date_of_birth.before' => 'Födelsedatum måste vara före idag.',
            'membership_type.required' => 'Medlemstyp är obligatorisk.',
            'customer_kind.required' => 'Kundtyp är obligatorisk.',
        ];
    }
}
