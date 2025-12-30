<?php
namespace App\Livewire\Customers;

use Livewire\Component;
use App\Models\Customer;

class CustomerInformation extends Component
{
    public $customer;

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
        return view('livewire.customers.customer-information');

    }
}
