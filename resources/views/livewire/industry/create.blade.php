<div class="px-6 md:px-10 lg:px-20 py-8">
    <div class="bg-white p-6 rounded-2xl shadow-lg max-w-3xl mx-auto">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Add Industry</h2>
        <hr class="mb-4 border-t-1.5 border-gray-300">

        <form wire:submit.prevent="store" enctype="multipart/form-data" class="space-y-6">

            <!-- Logo Upload -->
            <div class="space-y-4">
                <label class="block text-sm font-medium text-gray-700">Industry Logo</label>

                @if ($picture)
                    <div class="relative w-full max-w-md">
                        <img src="{{ $picture->temporaryUrl() }}" alt="Logo Preview" class="rounded-lg shadow w-full h-auto">
                        <button type="button" wire:click="removePicture"
                            class="absolute top-2 right-2 bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700 text-xs">
                            Remove
                        </button>
                    </div>
                @else
                    <input type="file" wire:model="picture"
                        class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4 file:rounded-full
                        file:border-0 file:text-sm file:font-semibold
                        file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                @endif

                @error('picture') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>

            <!-- Name + Sector -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" wire:model="name" placeholder="Industry Name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm" />
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Sector</label>
                    <input type="text" wire:model="industry_sector" placeholder="Industry Sector"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm" />
                    @error('industry_sector') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Website + Email -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Website</label>
                    <input type="text" wire:model="website" placeholder="Website Industry"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm" />
                    @error('website') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" wire:model="email" placeholder="Email Industry"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm" />
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Contact -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Contact</label>
                <input type="text" wire:model="contact" placeholder="Industry Contact"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm" />
                @error('contact') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Address -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                <input type="text" wire:model="address" placeholder="Industry Address"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm" />
                @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Submit -->
            <div class="flex justify-end mt-4">
                <button type="submit"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center">
                    Add
                </button>
            </div>

        </form>
    </div>
</div>
