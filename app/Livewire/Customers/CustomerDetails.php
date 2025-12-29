<?php
namespace App\Livewire\Customers;

use Livewire\Component;
use App\Models\Customer;

class CustomerDetails extends Component
{
    public $customer; // <-- Burası artık model

    public function mount(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function toJSON() // to prevent JSON serialization issues
    {
        return response()->json($this->customer);
    }

    public function render()
    {
        return view('livewire.customers.customer-details');
        // Blade'de zaten $customer property’si var, tekrar gönderilmeye gerek yok
    }
}
