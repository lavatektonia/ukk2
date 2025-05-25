<div class="">
    <form class="w-full">
        <div class="">
            <label for="student_id" class="block mb-2 text-lg font-medium text-black/70">Student Name</label>
            <select wire:model="student_id" type="text" id="student_id"
                class="text-sm rounded-lg block w-full p-2.5 bg-[#E7EBE8] text-black-700 border border-[#2E7D65] focus:ring-[#2E7D65] focus:border-[#2E7D65]
                    @error('student_id') border-red-600 @enderror" required>
                <option value="">Student Name</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
            @error('student_id')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
            @if(session()->has('error'))
                <div class="text-red-500">{{ session('error') }}</div>
            @endif
        </div>
    </form>
</div>
