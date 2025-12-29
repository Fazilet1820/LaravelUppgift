<?php

namespace Tests\Feature\Livewire;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\Customer;
use App\Livewire\Customers\CustomerForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

class CustomerFormTest extends TestCase
{
    use RefreshDatabase;


    #[Test]
    public function can_update_existing_customer()
    {
        $customer = Customer::factory()->create([
            'name' => 'Old Name',
            'email' => 'old@example.com',
        ]);

        Livewire::test(CustomerForm::class, ['customer' => $customer])
            ->set('name', 'Updated Name')
            ->set('email', 'updated@example.com')
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('customers', [
            'id' => $customer->id,
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ]);
    }

    #[Test]
    public function can_update_customer_with_same_email()
    {
        $customer = Customer::factory()->create([
            'email' => 'same@example.com',
        ]);

        Livewire::test(CustomerForm::class, ['customer' => $customer])
            ->set('name', 'Updated Name')
            ->set('email', 'same@example.com')
            ->call('save')
            ->assertHasNoErrors();
    }

#[Test]
   public function customers_list_page_opens()
{
    $response = $this->get('/customers');

    $response->assertStatus(200);
}

}
