<div class="max-w-screen-xl mx-auto px-4 py-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row items-center justify-between mb-6 gap-4">
        <h1 class="text-2xl font-bold text-indigo-700">Industry</h1>

        <div class="flex items-center gap-2 w-full md:w-auto">
            <!-- Search Input -->
            <div class="relative w-full md:w-64">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103.75 3.75a7.5 7.5 0 0012.9 12.9z"/>
                    </svg>
                </div>
                <input type="search" id="search"
                       class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm text-gray-800"
                       wire:model.live="search" placeholder="Search Industry..."/>
            </div>

            <!-- Add Button -->
            <a href="{{ route('industryCreate') }}"
               class="bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br text-white px-4 py-2 rounded-md text-sm font-semibold shadow">
                Add Industry
            </a>
        </div>
    </div>

    <!-- Industry Table -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-xs text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-4 py-2 text-center">No</th>
                    <th class="px-4 py-2 text-center">Name Industry</th>
                    <th class="px-4 py-2 text-center">Logo Industry</th>
                    <th class="px-4 py-2 text-center">Sector</th>
                    <th class="px-4 py-2 text-center">Contact</th>
                    <th class="px-4 py-2 text-center">Email</th>
                    <th class="px-4 py-2 text-center">Website</th>
                    <th class="px-4 py-2 text-center">Address</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($industries as $index => $industry)
                    <tr class="odd:bg-white even:bg-gray-50 border-b dark:border-gray-700">
                        <td class="px-4 py-3 text-center font-medium text-gray-900 dark:text-white">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 text-center">{{ $industry->name }}</td>
                        <!-- logo industri -->
                        <td class="px-4 py-3 text-center">
                            @if ($industry->picture)
                                <div class="w-full h-24 flex items-center justify-center">
                                    <img src="{{ asset('storage/' . $industry->picture) }}"
                                         alt="{{ $industry->name }}"
                                         class="h-16 w-16 object-contain mx-auto"/>
                                </div>
                            @else
                                <div class="w-full h-24 flex items-center justify-center text-gray-400 text-sm italic border rounded bg-gray-100">
                                    No Image
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center">{{ $industry->industry_sector }}</td>
                        <td class="px-4 py-3 text-center">{{ $industry->contact }}</td>
                        <td class="px-4 py-3 text-center">{{ $industry->email }}</td>
                        <!-- link website -->
                        <td class="px-4 py-3 text-center">
                            @if ($industry->website)
                                <a href="{{ $industry->website }}" target="_blank" rel="noopener noreferrer"
                                   class="text-blue-600 hover:underline">
                                    {{ $industry->website }}
                                </a>
                            @else
                                <span class="text-gray-400 italic">N/A</span>
                            @endif
                        </td>
                        <!-- link address -->
                        <td class="px-4 py-3 text-center">
                            <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($industry->address) }}"
                               target="_blank" rel="noopener noreferrer"
                               class="text-blue-600 hover:underline">
                                {{ $industry->address }}
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-4 py-4 text-center text-gray-500">No industry registered.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $industries->links() }}
    </div>
</div>
