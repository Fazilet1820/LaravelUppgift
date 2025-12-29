<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;

class CustomerForm extends Component
{
    public ?Customer $customer = null;

    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $address = '';
    public ?string $date_of_birth = null;
    public string $customer_kind = '';  // ← Boş string olarak başlat
    public string $membership_type = '';  // ← Boş string olarak başlat
    public bool $is_active = true;

    public function mount(?int $customerId = null): void
    {
        if ($customerId) {
            $this->customer = Customer::findOrFail($customerId);

            $this->name = $this->customer->name;
            $this->email = $this->customer->email;
            $this->phone = $this->customer->phone;
            $this->address = $this->customer->address;
            $this->date_of_birth = $this->customer->date_of_birth?->format('Y-m-d');
            $this->customer_kind = $this->customer->customer_kind->value ?? $this->customer->customer_kind;
            $this->membership_type = $this->customer->membership_type->value ?? $this->customer->membership_type;
            $this->is_active = $this->customer->is_active;
        }
    }

    protected function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:500'],
            'date_of_birth' => ['nullable', 'date', 'before:today'],
            'customer_kind' => ['required', 'in:individual,company,government'],
            'membership_type' => ['required', 'in:standard,premium'],
            'is_active' => ['boolean'],
        ];

        // Email unique kontrolü
        if ($this->customer) {
            $rules['email'][] = Rule::unique('customers', 'email')->ignore($this->customer->id);
        } else {
            $rules['email'][] = 'unique:customers,email';
        }

        return $rules;
    }

    protected function messages(): array
    {
        return [
            'name.required' => 'Namn är obligatoriskt.',
            'name.min' => 'Namn måste vara minst 3 tecken.',
            'email.required' => 'E-post är obligatorisk.',
            'email.email' => 'Ange en giltig e-postadress.',
            'email.unique' => 'Denna e-post används redan.',
            'phone.required' => 'Telefon är obligatorisk.',
            'address.required' => 'Adress är obligatorisk.',
            'date_of_birth.before' => 'Födelsedatum måste vara före idag.',
            'customer_kind.required' => 'Kundtyp är obligatorisk.',
            'customer_kind.in' => 'Välj en giltig kundtyp.',
            'membership_type.required' => 'Medlemstyp är obligatorisk.',
            'membership_type.in' => 'Välj en giltig medlemstyp.',
        ];
    }

    public function save()
    {
        $validated = $this->validate();

        try {
            DB::beginTransaction();

            if ($this->customer) {
                $this->customer->update($validated);
                session()->flash('success', 'Kund uppdaterad framgångsrikt!');
            } else {
                Customer::create($validated);
                session()->flash('success', 'Kund skapad framgångsrikt!');

                DB::commit();
                return redirect()->route('customers.index');
            }

            DB::commit();

        } catch (\Throwable $e) {
            DB::rollBack();
            report($e);
            session()->flash('error', 'Ett fel uppstod. Försök igen.');
        }
    }

    public function resetForm(): void
    {
        $this->reset([
            'name',
            'email',
            'phone',
            'address',
            'date_of_birth',
            'customer_kind',
            'membership_type'
        ]);

        $this->is_active = true;
        $this->resetValidation();
    }

    #[Computed]
    public function isEditMode(): bool
    {
        return $this->customer !== null;
    }

    #[Computed]
    public function formTitle(): string
    {
        return $this->isEditMode ? 'Redigera kund' : 'Skapa ny kund';
    }

    #[Computed]
    public function submitButtonText(): string
    {
        return $this->isEditMode ? 'Uppdatera' : 'Skapa';
    }

    #[Computed]
    public function customerKindOptions(): array
    {
        return [
            ['value' => 'individual', 'label' => 'Individual'],
            ['value' => 'company', 'label' => 'Company'],
            ['value' => 'government', 'label' => 'Government'],
        ];
    }

    #[Computed]
    public function membershipOptions(): array
    {
        return [
            ['value' => 'standard', 'label' => 'Standard'],
            ['value' => 'premium', 'label' => 'Premium'],
        ];
    }

    #[Title('Kund')]
    public function render()
    {
        return view('livewire.customers.customer-form');
    }
}
