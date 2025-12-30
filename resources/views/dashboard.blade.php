<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-8 p-8">
        <!-- Välkomstsektion -->
            <div class="rounded-xl p-10 shadow-xl" style="background: linear-gradient(to right, #B0AFB0, #A3A2A2, #969595);">

            <h1 class="mb-4 text-5xl font-extrabold drop-shadow-lg" style="color: white;">Välkommen!</h1>
            <p class="text-2xl font-medium" style="color: white;">Jag hoppas att mitt projekt har nått den önskade nivån</p>
        </div>

        <!-- Projektinformation -->
        <div class="rounded-xl border border-neutral-200 bg-white p-8 shadow-sm dark:border-neutral-700 dark:bg-zinc-800">
            <div class="mb-6 flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900">
                    <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Affärssystem</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Kundhantering & Administration</p>
                </div>
            </div>

            <div class="space-y-4">
                <div class="rounded-lg bg-gray-50 p-4 dark:bg-zinc-900">
                    <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Om Projektet</h3>
                    <p class="text-gray-700 leading-relaxed dark:text-gray-300">
                        En liten del av ett affärssystem med <span class="font-semibold text-black dark:text-black">Laravel</span> (backend)
                        och <span class="font-semibold text-black dark:text-blue-400">Livewire</span> (UI) med PHP.
                    </p>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <div class="rounded-lg border border-gray-200 p-4 dark:border-neutral-700">
                        <div class="mb-2 flex items-center gap-2">
                            <svg class="h-5 w-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <h4 class="font-semibold text-gray-900 dark:text-white">Funktioner</h4>
                        </div>
                        <ul class="space-y-1 text-sm text-gray-600 dark:text-gray-400">
                            <li>• Kundhantering :
                               <br> -Skapa ny kund
                                <br>-uppdatera kund
                                <br>-ta bort kund
                            </li>
                            <li>• Formulär & Validering</li>
                            <li>• Real-time Uppdateringar</li>
                            <li>• Sök funktion med efternamn, e-post eller telefonnummer</li>
                        </ul>
                    </div>

                    <div class="rounded-lg border border-gray-200 p-4 dark:border-neutral-700">
                        <div class="mb-2 flex items-center gap-2">
                            <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                            <h4 class="font-semibold text-gray-900 dark:text-white">Teknologier som används i projektet</h4>
                        </div>
                        <ul class="space-y-1 text-sm text-gray-600 dark:text-gray-400">
                            <li>• Laravel </li>
                            <li>• Livewire </li>
                            <li>• TailwindCSS</li>
                            <li>• PHP</li>
                            <li>• MySQL</li>
                            <li>• Blade Templating</li>
                            <li>• Feature Tests</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Snabbåtkomst -->
        <div class="grid gap-4 md:grid-cols-3">
            <a href="{{ route('customers.index') }}"
               class="group rounded-xl border border-neutral-200 bg-white p-6 shadow-sm transition-all hover:shadow-md dark:border-neutral-700 dark:bg-zinc-800 dark:hover:border-blue-500"
               wire:navigate>
                <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900">
                    <svg class="h-5 w-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h3 class="mb-1 font-semibold text-gray-900 dark:text-white">Kunder</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">Visa alla kunder</p>
            </a>

            <a href="{{ route('customers.form') }}"
               class="group rounded-xl border border-neutral-200 bg-white p-6 shadow-sm transition-all hover:shadow-md dark:border-neutral-700 dark:bg-zinc-800 dark:hover:border-green-500"
               wire:navigate>
                <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-green-100 dark:bg-green-900">
                    <svg class="h-5 w-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
                <h3 class="mb-1 font-semibold text-gray-900 dark:text-white">Ny Kund</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">Lägg till ny kund</p>
            </a>

            <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-zinc-800">
                <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-purple-100 dark:bg-purple-900">
                    <svg class="h-5 w-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h3 class="mb-1 font-semibold text-gray-900 dark:text-white">Statistik</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">Kommer snart</p>
            </div>
        </div>
    </div>
</x-layouts.app>





{{-- <x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div>
    </div>
</x-layouts.app> --}}
