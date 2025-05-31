<div class="max-w-screen-xl mx-auto px-4 py-6">
    <!-- {{-- Header: Pencarian --}} -->
    <div class="flex flex-col md:flex-row items-center justify-between mb-6 gap-4">
        <h1 class="text-2xl font-bold text-indigo-700 mb-2">12 - Network, Information, System, Application</h1>
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

        <!-- Student Table -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-4 py-3 text-center">No</th>
                        <th class="px-4 py-3 text-center">Name</th>
                        <th class="px-4 py-3 text-center">NIS</th>
                        <th class="px-4 py-3 text-center">Gender</th>
                        <th class="px-4 py-3 text-center">Class Group</th>
                        <th class="px-4 py-3 text-center">Address</th>
                        <th class="px-4 py-3 text-center">Contact</th>
                        <th class="px-4 py-3 text-center">Email</th>
                        <th class="px-4 py-3 text-center">PKL Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            <td class="px-4 py-3 font-medium text-gray-900 text-center whitespace-nowrap dark:text-white">
                                {{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}
                            </td>
                            <td class="px-4 py-3 text-center">{{ $student->name }}</td>
                            <td class="px-4 py-3 text-center">{{ $student->nis }}</td>
                            <!-- gender -->
                            <td class="px-4 py-3 text-center">
                                {{ $genders[$student->gender] ?? 'Unknown' }}
                            </td>
                            <!-- rombel -->
                            <td class="px-4 py-3 text-center">
                                {{ $class_groups[$student->class_group] ?? 'Unknown' }}
                            </td>
                            <td class="px-4 py-3 text-center">{{ $student->address }}</td>
                            <!-- link kontak -->
                            <td class="px-4 py-3 text-center">
                                @php
                                    $cleanNumber = preg_replace('/[^0-9]/', '', $student->contact);
                                @endphp
                                @if ($cleanNumber)
                                    <a href="https://wa.me/{{ $cleanNumber }}" target="_blank" rel="noopener noreferrer"
                                       class="text-green-600 hover:underline">
                                        WhatsApp ({{ $student->contact }})
                                    </a>
                                @else
                                    <span class="text-gray-400 italic">Tidak tersedia</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">{{ $student->email }}</td>
                            <!-- status pkl -->
                            <td class="px-4 py-3 text-center">
                                @if ($student->pkl_report_status)
                                    <span class="text-green-600 font-semibold">Active</span>
                                @else
                                    <span class="text-red-600 font-semibold">Nonactive</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-4 py-4 text-center text-gray-500">
                                No student registered.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">
                {{ $students->links() }}
            </div>
        </div>
    </div>
</div>
