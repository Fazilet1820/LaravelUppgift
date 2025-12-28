<?php

namespace App\Livewire\Customers;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Customer;

class CustomerList extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    // Reset page number on search update
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $customers = Customer::query()
            ->when($this->search, function($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhere('phone', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.customers.customer-list', [
            'customers' => $customers
        ]);
    }

    // Delete customer method
    public function deleteCustomer($id)
    {
        $customer = Customer::find($id);

        if ($customer) {
            $customer->delete();
            session()->flash('message', 'Kunde borttagen.');
        }
    }
}
