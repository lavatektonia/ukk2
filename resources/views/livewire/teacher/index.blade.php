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
        <form class="w-full max-w-xs">
            <label for="search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 19l-4-4m0 0a7 7 0 1 1 1-1 8a7 7 0 0 1-14 0z" />
                    </svg>
                </div>
                <input type="search" id="search"
                       class="block w-full ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                       wire:model.live="search" placeholder="Search..." />
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
                    <th class="px-4 py-2 text-center"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($teachers as $index => $teacher)
                    <tr class="bg-white border-t hover:bg-yellow-50">
                        <td class="px-4 py-3 text-center">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 text-center">{{ $teacher->name }}</td>
                        <td class="px-4 py-3 text-center">{{ $teacher->nip }}</td>
                        <td class="px-4 py-3 text-center">{{ $teacher->gender }}</td>
                        <td class="px-4 py-3 text-center">{{ $teacher->address }}</td>
                        <td class="px-4 py-3 text-center">{{ $teacher->contact_value }}</td>
                        <td class="px-4 py-3 text-center">{{ $teacher->email }}</td>
                        <td class="px-2 py-4 text-center">
                        <!-- action     -->
                        <div class="flex justify-center items-center gap-2"> 
                            <!-- view -->
                            <a href="{{ route('teacherView', ['id' => $teacher->id]) }}">
                                <button type="button"
                                    class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br 
                                    focus:ring-2 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 
                                    font-medium rounded-full text-xs px-3 py-1.5 text-center">
                                    View
                                </button>
                            </a>
                            
                            </div>
                        </td>
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
