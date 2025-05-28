<div class="max-w-4xl mx-auto mt-5 bg-white p-8 pb-4 rounded-xl shadow-md">
    <h2 class="text-2xl font-semibold text-indigo-700 mb-1 border-b-2 pb-2 border-gray-100">
        Edit Data PKL - {{ $pkl->student->name }}</h2>

    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-600 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div>
        <form wire:submit.prevent="update" class="px-6 py-6 space-y-6 bg-white rounded-b-lg">
            <!-- Nama Siswa -->
            <div class="flex flex-col">
                <label class="text-gray-700 font-medium">Student Name</label>
                    <input type="text" value="{{ $pkl->student->name }}" readonly
                    class="w-full p-3 border border-gray-300 bg-gray-100 text-gray-800 rounded-lg text-sm" />
            </div>

            <!-- Nama Guru & Industri -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="text-gray-700 font-medium">Teacher Name</label>
                    <select wire:model="teacher_id"
                        class="w-full p-3 border border-gray-300 bg-white text-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out text-sm">
                        <option value="">Select Teacher</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                    @error('teacher_id') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="text-gray-700 font-medium">Industry Name</label>
                    <select wire:model="industry_id"
                        class="w-full p-3 border border-gray-300 bg-white text-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out text-sm">
                        <option value="">Select Industry</option>
                        @foreach($industries as $industry)
                            <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                        @endforeach
                    </select>
                    @error('industry_id') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Tanggal -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="text-gray-700 font-medium">Start Date</label>
                    <input type="date" wire:model="start"
                        class="w-full p-3 border border-gray-300 bg-white text-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out text-sm" />
                    @error('start') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="text-gray-700 font-medium">End Date</label>
                    <input type="date" wire:model="end"
                        class="w-full p-3 border border-gray-300 bg-white text-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out text-sm" />
                    @error('end') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end gap-4 pt-2 transition-colors duration-300 ...">
                <a href="{{ route('pkl') }}"
                    class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium font-semibold rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 me-2 mb-2">
                    Cancel
                </a>
                <button type="submit"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium font-semibold rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
<!--  -->