<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;

class CustomerForm extends Component
{
    /** ---------------------------------
     *  STATE (form alanları)
     *  ---------------------------------
     */
    public ?Customer $customer = null;

    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $address = '';
    public ?string $date_of_birth = null;
    public string $customer_kind = 'individual';
    public string $membership_type = 'standard';
    public bool $is_active = true;

    /** ---------------------------------
     *  MOUNT
     *  ---------------------------------
     */
    public function mount(?int $customerId = null): void
    {
        if ($customerId) {
            $this->customer = Customer::findOrFail($customerId);

            $this->name = $this->customer->name;
            $this->email = $this->customer->email;
            $this->phone = $this->customer->phone;
            $this->address = $this->customer->address;
            $this->date_of_birth = $this->customer->date_of_birth?->format('Y-m-d');
            $this->customer_kind = $this->customer->customer_kind;
            $this->membership_type = $this->customer->membership_type;
            $this->is_active = $this->customer->is_active;
        }
    }

    /** ---------------------------------
     *  VALIDATION
     *  ---------------------------------
     */
    protected function rules(): array
    {
        return [
            'name'            => ['required', 'string', 'max:255'],
            'email'           => ['required', 'email', 'max:255'],
            'phone'           => ['required', 'regex:/^[0-9+\s()-]+$/'],
            'address'         => ['required', 'string', 'max:500'],
            'date_of_birth'   => ['nullable', 'date'],
            'customer_kind'   => ['required', 'in:individual,company,government'],
            'membership_type' => ['required', 'in:standard,premium'],
            'is_active'       => ['boolean'],
        ];
    }

    protected function messages(): array
    {
        return [
            'phone.regex' => 'Telefonnumret får endast innehålla siffror och + - ( )',
        ];
    }

    /** ---------------------------------
     *  SAVE
     *  ---------------------------------
     */
    public function save(): void
    {
        $data = $this->validate();

        try {
            DB::beginTransaction();

            if ($this->customer) {
                $this->customer->update($data);
                session()->flash('success', 'Kund uppdaterad framgångsrikt!');
            } else {
                Customer::create($data);
                session()->flash('success', 'Kund skapad framgångsrikt!');
            }

            DB::commit();

        } catch (\Throwable $e) {
            DB::rollBack();

            report($e);
            session()->flash('error', 'Ett fel uppstod. Försök igen.');
        }
    }

    /** ---------------------------------
     *  COMPUTED (Blade’in kullandıkları)
     *  ---------------------------------
     */
    #[Computed]
    public function isEditMode(): bool
    {
        return $this->customer !== null;
    }

    #[Computed]
    public function formTitle(): string
    {
        return $this->isEditMode
            ? 'Redigera kund'
            : 'Skapa ny kund';
    }

    #[Computed]
    public function submitButtonText(): string
    {
        return $this->isEditMode
            ? 'Uppdatera'
            : 'Skapa';
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
            ['value' => 'standard', 'label' => 'Standart'],
            ['value' => 'premium', 'label' => 'Premium'],
        ];
    }

    /** ---------------------------------
     *  RENDER
     *  ---------------------------------
     */
    #[Title('Kund')]
    public function render()
    {
        return view('livewire.customers.customer-form');
    }
}
