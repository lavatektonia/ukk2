<div class="container mx-auto px-4 py-6">
    <!-- Notifikasi pesan sukses / error -->
    @if (session()->has('success'))
    <div class="bg-green-100 text-green-700 px-4 py-2 rounded-md mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if (session()->has('error'))
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded-md mb-4">
        {{ session('error') }}
    </div>
    @endif

    {{-- Header: Tombol dan Pencarian --}}
    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('pkl') }}"
           class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-full text-sm px-5 py-2.5 text-center">
            Add PKL Data
        </a>

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

    {{-- Tabel --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">NIS</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Teacher</th>
                    <th class="px-6 py-3">Industry</th>
                    <th class="px-6 py-3">Sector Industry</th>
                    <th class="px-6 py-3">Start</th>
                    <th class="px-6 py-3">End</th>
                    <th class="px-6 py-3">Duration</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pkls as $key => $pkl)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $key + 1 }}
                        </th>
                        <td class="px-6 py-4">{{ $pkl->student->nis }}</td>
                        <td class="px-6 py-4">{{ $pkl->student->name }}</td>
                        <td class="px-6 py-4">{{ $pkl->teacher->name }}</td>
                        <td class="px-6 py-4">{{ $pkl->industry->name }}</td>
                        <td class="px-6 py-4">{{ $pkl->industry->industry_sector }}</td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($pkl->start)->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($pkl->end)->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($pkl->start)->diffInDays(\Carbon\Carbon::parse($pkl->end)) }} days
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center py-4 text-gray-500">Unregistered Student</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
