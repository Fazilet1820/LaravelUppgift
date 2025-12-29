<?php
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Livewire\Customers\CustomerForm;
use App\Livewire\Customers\CustomerList as CustomerListComponent;  // ← ALIAS added because of name conflict (changed folder and caused problem)
use App\Livewire\Customers\CustomerDetails;

// Redirect home route to my dashboard when project starts
Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('home');


Route::view('/', 'dashboard')  ->name('dashboard');

Route::get('/customers/form', CustomerForm::class)->name('customers.form');
Route::get('/customers', CustomerListComponent::class)->name('customers.index');  // ← ALIAS used here
Route::get('/customers/{customer}/edit', CustomerForm::class)->name('customers.edit');
Route::get('/customers/{customer}', CustomerDetails::class)->name('customers.show');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::get('settings/password', Password::class)->name('user-password.edit');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
