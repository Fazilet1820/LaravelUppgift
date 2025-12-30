<div class="max-w-3xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-black">{{ $this->formTitle }}</h1>
        @if($this->isEditMode)
            <p class="mt-1 text-sm text-gray-500">
                Kund-ID: #{{ $this->customer->id }} | Skapad: {{ $this->customer->created_at->format('Y-m-d H:i') }}
            </p>
        @endif
    </div>

    @if (session()->has('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg" role="alert">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg" role="alert">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <form wire:submit.prevent="save" class="bg-white shadow-md rounded-lg p-6 space-y-6">

        {{-- Name --}}
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                Namn <span class="text-red-500">*</span>
            </label>
            <input
                type="text"
                id="name"
                wire:model="name"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @else border-gray-300 @enderror"
                placeholder="Ange kundnamn"
            >
            @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                E-post <span class="text-red-500">*</span>
            </label>
            <input
                type="email"
                id="email"
                wire:model="email"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @else border-gray-300 @enderror"
                placeholder="exempel@email.com"
            >
            @error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        {{-- Phone --}}
        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                Telefon <span class="text-red-500">*</span>
            </label>
            <input
                type="tel"
                id="phone"
                wire:model="phone"
                pattern="^\+?[0-9\s]+$"
                inputmode="numeric"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('phone') border-red-500 @else border-gray-300 @enderror"
                placeholder="+46 70 123 45 67"
            >
            @error('phone')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        {{-- Address --}}
        <div>
            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">
                Adress <span class="text-red-500">*</span>
            </label>
            <textarea
                id="address"
                wire:model="address"
                rows="3"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('address') border-red-500 @else border-gray-300 @enderror"
                placeholder="Gatuadress, postnummer, stad"
            ></textarea>
            @error('address')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        {{-- Dropdowns --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Customer kind --}}
            <div>
                <label for="customer_kind" class="block text-sm font-medium text-gray-700 mb-1">
                    Kundtyp <span class="text-red-500">*</span>
                </label>
                <select
                    id="customer_kind"
                    wire:model="customer_kind"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('customer_kind') border-red-500 @else border-gray-300 @enderror"
                >
                    <option value="">Välj kundtyp</option>
                    @foreach($this->customerKindOptions as $option)
                        <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                    @endforeach
                </select>
                @error('customer_kind')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            {{-- Membership type --}}
            <div>
                <label for="membership_type" class="block text-sm font-medium text-gray-700 mb-1">
                    Medlemstyp <span class="text-red-500">*</span>
                </label>
                <select
                    id="membership_type"
                    wire:model="membership_type"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('membership_type') border-red-500 @else border-gray-300 @enderror"
                >
                    <option value="">Välj medlemstyp</option>
                    @foreach($this->membershipOptions as $option)
                        <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                    @endforeach
                </select>
                @error('membership_type')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>

        {{-- Date of birth --}}
        <div>
            <label for="date_of_birth" class="block text-sm font-medium text-gray-700 mb-1">
                Födelsedatum
            </label>
            <input
                type="date"
                id="date_of_birth"
                wire:model="date_of_birth"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('date_of_birth') border-red-500 @else border-gray-300 @enderror"
            >
            @error('date_of_birth')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        {{-- Is active --}}
        <div class="flex items-center">
            <input
                type="checkbox"
                id="is_active"
                wire:model.live="is_active"
                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
            >
            <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">
                @if($this->isEditMode)
                    Kunden är aktiv
                @else
                    Skapa som aktiv kund
                @endif
            </label>
        </div>

         {{-- Buttons --}}
        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
            <a href="{{ route('customers.index') }}" class="px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">Avbryt</a>

            <div class="flex items-center space-x-3">
                @if(!$this->isEditMode)
                    <button type="button" wire:click="resetForm" class="px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">Rensa</button>
                @endif

                <button type="submit"
        wire:loading.attr="disabled"
        wire:target="save"
        style="background-color:#2563EB; color:white;"
        class="px-6 py-2 rounded-lg flex items-center justify-center space-x-2">
    <span wire:loading.remove wire:target="save">{{ $this->submitButtonText }}</span>
    <span wire:loading wire:target="save" class="flex items-center space-x-2">
        <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <span>Sparar...</span>
    </span>
</button>
            </div>
        </div>
    </form>
</div>
