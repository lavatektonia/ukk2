<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <!-- Description -->
        <div class="mb-4 text-sm text-gray-600 text-center">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-validation-errors class="mb-4" />

        <!-- Form -->
        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password"
                         class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm
                                focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400 text-sm"
                         type="password"
                         name="password"
                         required
                         autocomplete="current-password"
                         autofocus />
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <x-button class="ms-2">
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
