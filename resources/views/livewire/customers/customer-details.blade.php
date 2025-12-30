<div class="container mx-auto px-4 py-8">
    <div class="max-w-6xl mx-auto">

        <!-- Tillbaka-knapp -->
        <div class="mb-6">
            <a href="{{ route('customers.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                🔙 Tillbaka till kundlistan
            </a>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">

            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-8 py-6 flex justify-between items-start">
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2">{{ $customer->name }}</h1>
                    @if($customer->is_active)
                        <span class="px-3 py-1 bg-green-500 text-white text-sm font-semibold rounded-full">✓ Aktiv Kund</span>
                    @else
                        <span class="px-3 py-1 bg-red-500 text-white text-sm font-semibold rounded-full">✗ Inaktiv Kund</span>
                    @endif
                </div>
                <a href="{{ route('customers.edit', $customer->id) }}" class="inline-flex items-center px-4 py-2 bg-white text-blue-600 hover:bg-gray-100 font-semibold rounded-lg transition">
                    ✏️ Redigera Kund
                </a>
            </div>

            <div class="px-8 py-8 grid grid-cols-1 md:grid-cols-2 gap-8">


                <div class="space-y-8">
                    <!-- Kontaktinformation -->
                    <div class="bg-gray-50 p-6 rounded-lg shadow space-y-4">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">📧 Kontaktinformation</h2>
                        <p><strong>Email:</strong> <a href="mailto:{{ $customer->email }}" class="text-blue-600">{{ $customer->email }}</a></p>
                        <p><strong>Telefon:</strong> <a href="tel:{{ $customer->phone }}" class="text-blue-600">{{ $customer->phone }}</a></p>
                        <p><strong>Address:</strong> {{ $customer->address ?: 'Ej angiven' }}</p>
                    </div>

                    <!-- Personlig Information -->
                    <div class="bg-gray-50 p-6 rounded-lg shadow space-y-4">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">👤 Personlig Information</h2>
                        <p><strong>Födelsedatum:</strong>
                            @if($customer->date_of_birth)
                                {{ $customer->date_of_birth->format('d.m.Y') }} ({{ $customer->date_of_birth->age }} år gammal)
                            @else
                                Ej angiven
                            @endif
                        </p>
                    </div>
                </div>


                <div class="space-y-8">
                    <!-- Medlemskapsinformation -->
                    <div class="bg-gray-50 p-6 rounded-lg shadow space-y-4">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">🏷️ Medlemskapsinformation</h2>
                        <p><strong>Medlemstyp:</strong> {{ $customer->membership_type->value ?? 'Ej angiven' }}</p>
                        <p><strong>Kundtyp:</strong> {{ $customer->customer_kind->value ?? 'Ej angiven' }}</p>
                    </div>

                    <!-- Systeminformation -->
                    <div class="bg-gray-50 p-6 rounded-lg shadow space-y-4">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">💻 Systeminformation</h2>
                        <p><strong>Registreringsdatum:</strong> {{ $customer->created_at->format('d.m.Y H:i') }} <span class="text-sm text-gray-500">({{ $customer->created_at->diffForHumans() }})</span></p>
                        <p><strong>Senast uppdaterad:</strong> {{ $customer->updated_at->format('d.m.Y H:i') }} <span class="text-sm text-gray-500">({{ $customer->updated_at->diffForHumans() }})</span></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
