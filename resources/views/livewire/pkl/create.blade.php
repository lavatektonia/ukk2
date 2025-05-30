<div class="px-6 md:px-10 lg:px-20 py-8">
    <div class="bg-white p-6 rounded-2xl shadow-lg max-w-3xl mx-auto">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Add PKL Data</h2>
        <hr class="mb-4 border-t-1.5 border-gray-300"></hr>

        <form class="space-y-4 text-m">
            <!-- NAMA SISWA -->
            <div>
                <label for="student_id" class="block mb-2 font-medium text-gray-700">Student Name</label>
                    <input type="text" value="{{ $name_student }}" disabled
                    class="w-full p-3 border border-gray-300 bg-gray-100 text-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150 ease-in-out text-sm">
                <input type="hidden" wire:model="student_id">
                @error('student_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                @if(session()->has('error')) <p class="text-red-500 text-xs mt-1">{{ session('error') }}</p> @endif
            </div>

            <!-- NAMA GURU -->
            <div>
                <label for="teacher_id" class="block mb-2 font-medium text-gray-700">Teacher Name</label>
                <select wire:model="teacher_id" id="teacher_id"
                    class="w-full p-3 border border-gray-300 bg-white text-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out text-sm">
                    <option value="">Select Teacher</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach
                </select>
                @error('teacher_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- NAMA INDUSTRI -->
            <div>
                <label for="industry_id" class="block mb-2 font-medium text-gray-700">Industry Name</label>
                <select wire:model="industry_id" id="industry_id"
                    class="w-full p-3 border border-gray-300 bg-white text-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out text-sm">
                    <option value="">Select Industry</option>
                    @foreach ($industries as $industry)
                        <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                    @endforeach
                </select>
                @error('industry_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- TANGGAL -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="start" class="block mb-2 font-medium text-gray-700">Start</label>
                    <input type="date" wire:model="start" id="start"
                        class="w-full p-3 border border-gray-300 bg-white text-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out text-sm">
                    @error('start') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="end" class="block mb-2 font-medium text-gray-700">End</label>
                    <input type="date" wire:model="end" id="end"
                        class="w-full p-3 border border-gray-300 bg-white text-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out text-sm">
                    @error('end') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- button -->
            <div class="flex justify-end space-x-2 mt-4">
            <!-- Cancel -->
            <a href="{{ route('pkl') }}"
                class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 text-center">
                Cancel
            </a>
            <!-- Add -->
            <button type="submit"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center">
                Add
            </button>
            </div>
        </form>
    </div>
</div>
