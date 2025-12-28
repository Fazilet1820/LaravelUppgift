<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md p-6">

        {{-- Başlık ve Yeni Müşteri Butonu --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Müşteri Listesi</h2>
            <a href="{{ route('customers.create') }}"
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                + Yeni Müşteri
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
                placeholder="İsim, email veya telefon ile ara..."
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            >
        </div>

        {{-- Tablo --}}
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">İsim</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Telefon</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">İşlemler</th>
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
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('customers.show', $customer->id) }}"
                                   class="text-blue-600 hover:text-blue-900 mr-3">
                                    Görüntüle
                                </a>
                                <a href="{{ route('customers.edit', $customer->id) }}"
                                   class="text-green-600 hover:text-green-900 mr-3">
                                    Düzenle
                                </a>
                                <button
                                    wire:click="deleteCustomer({{ $customer->id }})"
                                    wire:confirm="Bu müşteriyi silmek istediğinizden emin misiniz?"
                                    class="text-red-600 hover:text-red-900">
                                    Sil
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                Henüz müşteri bulunmamaktadır.
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
