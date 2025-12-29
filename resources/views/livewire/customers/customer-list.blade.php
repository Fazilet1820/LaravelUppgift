<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md p-6">

        {{-- Başlık ve Yeni Müşteri Butonu --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Kundlista</h2>
            <a href="{{ route('customers.form') }}"
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                + Ny Kund
            </a>
        </div>

        {{-- Başarı Mesajı --}}
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        {{-- Arama Kutusu --}}
        <div class="mb-4">
            <input
                type="text"
                wire:model.live="search"
                placeholder="Sök efter namn, e-post eller telefon..."
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            >
        </div>

        {{-- Tablo --}}
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Namn</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Telefon</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Adress</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Kundtype</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Medlemstype</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Active Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Åtgärder</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($customers as $customer)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <a href="{{ route('customers.show', $customer->id) }}"
                                   class="text-base font-semibold text-blue-600 hover:text-blue-900 hover:underline">
                                    {{ $customer->name }}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $customer->email }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $customer->phone }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $customer->address }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $customer->customer_kind }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $customer->membership_type }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm">
                                    @if($customer->is_active)
                                        <span class="text-white bg-green-500 px-2 py-1 rounded">Active</span>
                                    @else
                                        <span class="text-white bg-red-500 px-2 py-1 rounded">Inactive</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium flex gap-2">
    <a href="{{ route('customers.edit', $customer->id) }}"
       class="inline-flex items-center justify-center px-3 py-1 text-white rounded hover:bg-red-500">
        ✏️
    </a>

    <button
        wire:click="deleteCustomer({{ $customer->id }})"
        wire:confirm="Är du säker på att du vill ta bort kunden?"
        class="inline-flex items-center justify-center px-3 py-1 text-white rounded hover:bg-red-600">
        🗑️
    </button>
</td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                               Det finns inga kunder ännu.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $customers->links() }}
        </div>
    </div>
</div>
