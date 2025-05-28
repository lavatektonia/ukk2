<div class="max-w-screen-xl mx-auto px-4 py-6">
    <!-- {{-- Notifikasi --}} -->
    @if (session()->has('success'))
        <div class="mb-4 px-4 py-2 text-green-700 bg-green-100 border border-green-200 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-4 px-4 py-2 text-red-700 bg-red-100 border border-red-200 rounded-md">
            {{ session('error') }}
        </div>
    @endif

    <!-- {{-- Header: Pencarian --}} -->
    <div class="flex justify-end mb-4">
        <form class="">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" aria-hidden="true">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0 0a7 7 0 1 1 1-1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                <input type="search" id="default-search" class="block w-full ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" wire:model.live="search" placeholder="Search" required />
                </div>
        </form>
    </div>

    <!-- {{-- Tabel Data Guru --}} -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-4 py-2 text-center">No</th>
                    <th class="px-4 py-2 text-center">Name</th>
                    <th class="px-4 py-2 text-center">NIP</th>
                    <th class="px-4 py-2 text-center">Gender</th>
                    <th class="px-4 py-2 text-center">Address</th>
                    <th class="px-4 py-2 text-center">Contact</th>
                    <th class="px-4 py-2 text-center">Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($teachers as $index => $teacher)
                    <!-- informasi guru -->
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <td class="px-4 py-3 font-medium text-gray-900 text-center whitespace-nowrap dark:text-white">{{ $teacher->id }}</td>
                        <td class="px-4 py-3 text-center">{{ $teacher->name }}</td>
                        <td class="px-4 py-3 text-center">{{ $teacher->nip }}</td>
                        <td class="px-4 py-3 text-center">{{ $teacher->gender }}</td>
                        <td class="px-4 py-3 text-center">{{ $teacher->address }}</td>
                        <!-- link contact -->
                        <td class="px-4 py-3 text-center">
                            @if ($teacher->contact_type === 'telegram')
                                <a href="https://t.me/{{ ltrim($teacher->contact_value, '@') }}"
                                    target="_blank" rel="noopener noreferrer"
                                    class="text-blue-600 hover:underline">
                                    Telegram ({{ $teacher->contact_value }})
                                </a>
                            @elseif ($teacher->contact_type === 'whatsapp')
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $teacher->contact_value) }}"
                                    target="_blank" rel="noopener noreferrer"
                                    class="text-green-600 hover:underline">
                                    WhatsApp ({{ $teacher->contact_value }})
                                </a>
                            @else
                                {{ ucfirst($teacher->contact_type) }} {{ $teacher->contact_value }}
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center">{{ $teacher->email }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-4 text-center text-gray-500">No teachers registered.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
