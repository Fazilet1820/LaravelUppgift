<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">

        {{-- Geri Butonu --}}
        <div class="mb-6">
            <a href="{{ route('customers.index') }}"
               class="inline-flex items-center text-blue-600 hover:text-blue-800">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Müşteri Listesine Dön
            </a>
        </div>

        {{-- Ana Kart --}}
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-8 py-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-2">{{ $customer->name }}</h1>
                        <div class="flex items-center space-x-2">
                            @if($customer->is_active)
                                <span class="px-3 py-1 bg-green-500 text-white text-sm font-semibold rounded-full">
                                    ✓ Aktif Müşteri
                                </span>
                            @else
                                <span class="px-3 py-1 bg-red-500 text-white text-sm font-semibold rounded-full">
                                    ✗ Pasif Müşteri
                                </span>
                            @endif
                        </div>
                    </div>
                    <a href="{{ route('customers.edit', $customer->id) }}"
                       class="inline-flex items-center px-4 py-2 bg-white text-blue-600 hover:bg-gray-100 font-semibold rounded-lg transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Düzenle
                    </a>
                </div>
            </div>

            {{-- İçerik --}}
            <div class="px-8 py-8">

                {{-- İletişim Bilgileri --}}
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        İletişim Bilgileri
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-50 p-6 rounded-lg">
                        <div>
                            <label class="text-sm font-medium text-gray-500 block mb-1">Email Adresi</label>
                            <a href="mailto:{{ $customer->email }}"
                               class="text-base text-blue-600 hover:underline flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                                {{ $customer->email }}
                            </a>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500 block mb-1">Telefon Numarası</label>
                            <a href="tel:{{ $customer->phone }}"
                               class="text-base text-blue-600 hover:underline flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                {{ $customer->phone }}
                            </a>
                        </div>
                        <div class="md:col-span-2">
                            <label class="text-sm font-medium text-gray-500 block mb-1">Adres</label>
                            <p class="text-base text-gray-900 flex items-start">
                                <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $customer->address ?: 'Belirtilmemiş' }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Kişisel Bilgiler --}}
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Kişisel Bilgiler
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-50 p-6 rounded-lg">
                        <div>
                            <label class="text-sm font-medium text-gray-500 block mb-1">Doğum Tarihi</label>
                            <p class="text-base text-gray-900 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                @if($customer->date_of_birth)
                                    {{ $customer->date_of_birth->format('d.m.Y') }}
                                    <span class="ml-2 text-sm text-gray-500">({{ $customer->date_of_birth->age }} yaşında)</span>
                                @else
                                    <span class="text-gray-500">Belirtilmemiş</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Üyelik Bilgileri --}}
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                        </svg>
                        Üyelik Bilgileri
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-50 p-6 rounded-lg">
                        <div>
                            <label class="text-sm font-medium text-gray-500 block mb-2">Üyelik Tipi</label>
                            <span class="px-4 py-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                {{ $customer->membership_type->value ?? 'Belirtilmemiş' }}
                            </span>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500 block mb-2">Müşteri Türü</label>
                            <span class="px-4 py-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                {{ $customer->customer_kind->value ?? 'Belirtilmemiş' }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Sistem Bilgileri --}}
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Sistem Bilgileri
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-50 p-6 rounded-lg">
                        <div>
                            <label class="text-sm font-medium text-gray-500 block mb-1">Kayıt Tarihi</label>
                            <p class="text-base text-gray-900">
                                {{ $customer->created_at->format('d.m.Y H:i') }}
                                <span class="text-sm text-gray-500 block">{{ $customer->created_at->diffForHumans() }}</span>
                            </p>
