<div class="max-w-screen-xl mx-auto px-4 py-6">
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

    <!-- Header -->
    <div class="flex flex-col md:flex-row items-center justify-between mb-6 gap-4">
        <h1 class="text-2xl font-bold text-indigo-700 mb-2">Data PKL - 12 SIJA</h1>

        <div class="flex items-center gap-2 w-full md:w-auto relative">
    <!-- Search Icon -->
    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        <!-- Heroicon: Magnifying Glass -->
        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103.75 3.75a7.5 7.5 0 0012.9 12.9z" />
        </svg>
    </div>
    <!-- Input -->
    <input type="search" id="search"
        class="block w-full md:w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm text-gray-800"
        wire:model.live="search" placeholder="Search..." />
    <!-- Button -->
    <a href="{{ route('pklCreate') }}"
        class="inline-block bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br text-white 
        px-4 py-2 rounded-md text-sm font-semibold font-medium shadow">
        Add Data PKL
    </a>
</div>
    </div>

    <!-- {{-- Tabel --}} -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-2 py-2 text-center">No</th>
                    <th class="px-2 py-2 text-center">NIS</th>
                    <th class="px-2 py-2 text-center">Name</th>
                    <th class="px-2 py-2 text-center">Teacher</th>
                    <th class="px-2 py-2 text-center">Industry</th>
                    <th class="px-2 py-2 text-center">Sector Industry</th>
                    <th class="px-2 py-2 text-center">Start</th>
                    <th class="px-2 py-2 text-center">End</th>
                    <th class="px-2 py-2 text-center">Duration</th>
                    <th class="px-2 py-2 text-center"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pkls as $key => $pkl)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th class="px-6 py-4 font-medium text-gray-900 text-center whitespace-nowrap dark:text-white">
                            {{ $key + 1 }}
                        </th>
                        <td class="px-2 py-2 text-center">{{ $pkl->student->nis }}</td>
                        <td class="px-2 py-2 text-center">{{ $pkl->student->name }}</td>
                        <td class="px-2 py-2 text-center">{{ $pkl->teacher->name }}</td>
                        <td class="px-2 py-2 text-center">{{ $pkl->industry->name }}</td>
                        <td class="px-2 py-2 text-center">{{ $pkl->industry->industry_sector }}</td>
                        <td class="px-2 py-2 text-center">{{ \Carbon\Carbon::parse($pkl->start)->format('d M Y') }}</td>
                        <td class="px-2 py-2 text-center">{{ \Carbon\Carbon::parse($pkl->end)->format('d M Y') }}</td>
                        <td class="px-2 py-2 text-center">{{ \Carbon\Carbon::parse($pkl->start)->diffInDays(\Carbon\Carbon::parse($pkl->end)) }} days</td>
                        <!-- action -->
                        <td class="px-2 py-4 text-center">
                            <div class="flex justify-center items-center gap-2">
                            <!-- view -->
                            <a href="{{ route('pklView', ['id' => $pkl->id]) }}">
                                <button type="button"
                                    class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br 
                                    focus:ring-2 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 
                                    font-medium rounded-full text-xs px-3 py-1.5 text-center">
                                    View
                                </button>
                            </a>
                            <!-- edit -->
                            <a href="{{ route('pklEdit', ['id' => $pkl->id]) }}">
                                <button type="button"
                                    class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br 
                                    focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 
                                    font-medium rounded-full text-xs px-3 py-1.5 text-center">
                                    Edit
                                </button>
                            </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center py-4 text-gray-500">Unregistered Student</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
