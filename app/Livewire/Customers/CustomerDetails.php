<?php

namespace App\Livewire\Customers;

use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\Locked;

class CustomerDetails extends Component
{
    public int $customerId;

    public function mount(int $id)
    {
        $this->customerId = $id;

        // Müşterinin var olup olmadığını kontrol et
        if (!Customer::find($id)) {
            abort(404, 'Müşteri bulunamadı');
        }
    }

    public function render()
    {
        $customer = Customer::findOrFail($this->customerId);

        return view('livewire.customers.customer-details', [
            'customer' => $customer
        ]);
    }
}
