<div class="p-6 bg-gray-100 min-h-screen text-sm">
    <div class="max-w-4xl mx-auto space-y-6">

        <h1 class="text-xl font-bold text-indigo-700 mb-4">PKL Detail - {{ $pkl->student->name }}</h1>

        <!-- Student -->
        <div class="bg-white shadow-md rounded-lg p-6 text-sm mb-4">
            <div class="flex items-center space-x-2 border-b-2 pb-2 border-gray-100 mb-4">
                <div class="w-1.5 h-5 bg-yellow-400 rounded-r"></div>
                <h2 class="text-lg font-semibold text-gray-800">Student Information</h2>
            </div>
            <!-- data siswa -->
            <div class="grid grid-cols-[150px_1fr] gap-x-4 gap-y-2">
                <div class="text-gray-700 font-medium">Name</div>
                <div>{{ $pkl->student->name }}</div>
                <div class="text-gray-700 font-medium">NIS</div>
                <div>{{ $pkl->student->nis }}</div>
                <div class="text-gray-700 font-medium">Gender</div>
                <div>{{ $pkl->student->gender }}</div>
                <div class="text-gray-700 font-medium">Class Group</div>
                <div>{{ $pkl->student->class_group }}</div>
                <!-- link kontak no WA gaboleh pakai +/- dan spasi -->
                <div class="text-gray-700 font-medium">Contact</div>
                <div>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pkl->student->contact) }}"
                       target="_blank" rel="noopener noreferrer"
                       class="text-green-600 hover:underline">
                        WhatsApp ({{ $pkl->student->contact }})
                    </a>
                </div>
                <div class="text-gray-700 font-medium">Email</div>
                <div>{{ $pkl->student->email }}</div>
                <!-- link alamat -->
                <div class="text-gray-700 font-medium">Address</div>
                <div>
                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($pkl->student->address) }}"
                       target="_blank" rel="noopener noreferrer"
                       class="text-blue-600 hover:underline">
                        {{ $pkl->student->address }}
                    </a>
                </div>
            </div>
        </div>

        <!-- Teacher -->
        <div class="bg-white shadow-md rounded-lg p-6 text-sm mb-4">
            <div class="flex items-center space-x-2 border-b-2 pb-2 border-gray-100 mb-4">
                <div class="w-1.5 h-5 bg-yellow-400 rounded-r"></div>
                <h2 class="text-lg font-semibold text-gray-800">Teacher Information</h2>
            </div>
            <!-- data guru -->
            <div class="grid grid-cols-[150px_1fr] gap-x-4 gap-y-2">
                <div class="text-gray-700 font-medium">Name</div>
                <div>{{ $pkl->teacher->name }}</div>
                <div class="text-gray-700 font-medium">NIP</div>
                <div>{{ $pkl->teacher->nip }}</div>
                <div class="text-gray-700 font-medium">Gender</div>
                <div>{{ $pkl->teacher->gender }}</div>
                <!-- link contact | no WA gaboleh pakai +/- dan spasi -->
                <div class="text-gray-700 font-medium">Contact</div>
                <div>
                    @if ($pkl->teacher->contact_type === 'telegram')
                        <a href="https://t.me/{{ ltrim($pkl->teacher->contact_value, '@') }}"
                           target="_blank" rel="noopener noreferrer"
                           class="text-blue-600 hover:underline">
                            Telegram ({{ $pkl->teacher->contact_value }})
                        </a>
                    @elseif ($pkl->teacher->contact_type === 'whatsapp')
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pkl->teacher->contact_value) }}"
                           target="_blank" rel="noopener noreferrer"
                           class="text-green-600 hover:underline">
                            WhatsApp ({{ $pkl->teacher->contact_value }})
                        </a>
                    @else
                        {{ ucfirst($pkl->teacher->contact_type) }} {{ $pkl->teacher->contact_value }}
                    @endif
                </div>
                <div class="text-gray-700 font-medium">Email</div>
                <div>{{ $pkl->teacher->email }}</div>
                <!-- link alamat -->
                <div class="text-gray-700 font-medium">Address</div>
                <div>
                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($pkl->teacher->address) }}"
                       target="_blank" rel="noopener noreferrer"
                       class="text-blue-600 hover:underline">
                        {{ $pkl->teacher->address }}
                    </a>
                </div>
            </div>
        </div>

        <!-- Industry -->
        <div class="bg-white shadow-md rounded-lg p-6 text-sm mb-4">
            <div class="flex items-center justify-between border-b-2 pb-2 border-gray-100 mb-4">
                <div class="flex items-center space-x-2">
                    <div class="w-1.5 h-5 bg-yellow-400 rounded-r"></div>
                    <h2 class="text-lg font-semibold text-gray-800">Industry Information</h2>
                </div>
                <!-- logo industri -->
                @if ($pkl->industry->picture)
                    <div class="w-28 h-14">
                        <img src="{{ asset('storage/' . $pkl->industry->picture) }}"
                             alt="Industry Logo"
                             class="w-full h-full object-contain">
                    </div>
                @endif
            </div>
            <!-- data industri -->
            <div class="grid grid-cols-[150px_1fr] gap-x-4 gap-y-2">
                <div class="text-gray-700 font-medium">Name</div>
                <div>{{ $pkl->industry->name }}</div>

                <div class="text-gray-700 font-medium">Sector</div>
                <div>{{ $pkl->industry->industry_sector }}</div>

                <div class="text-gray-700 font-medium">Contact</div>
                <div>{{ $pkl->industry->contact }}</div>

                <div class="text-gray-700 font-medium">Email</div>
                <div>{{ $pkl->industry->email }}</div>
                <!-- link website -->
                @if ($pkl->industry->website)
                    <div class="text-gray-700 font-medium">Website</div>
                    <div>
                        <a href="{{ $pkl->industry->website }}"
                           target="_blank" rel="noopener noreferrer"
                           class="text-blue-600 hover:underline">
                            {{ $pkl->industry->website }}
                        </a>
                    </div>
                @endif
                <!-- link alamat -->
                <div class="text-gray-700 font-medium">Address</div>
                <div>
                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($pkl->industry->address) }}"
                       target="_blank" rel="noopener noreferrer"
                       class="text-blue-600 hover:underline">
                        {{ $pkl->industry->address }}
                    </a>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div class="flex justify-end mt-4">
            <a href="{{ route('pkl') }}" type="button"
               class="bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br text-white font-semibold rounded-full text-sm px-4 py-2 transition">
                Back
            </a>
        </div>

    </div>
</div>
