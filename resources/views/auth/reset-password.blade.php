<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <!-- Error messages -->
        <x-validation-errors class="mb-4" />

        <!-- Reset Password Form -->
        <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email"
                         class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm
                                focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                         type="email"
                         name="email"
                         :value="old('email', $request->email)"
                         required
                         autofocus
                         autocomplete="username" />
            </div>

            <!-- New Password -->
            <div>
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password"
                         class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm
                                focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                         type="password"
                         name="password"
                         required
                         autocomplete="new-password" />
            </div>

            <!-- Confirm New Password -->
            <div>
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation"
                         class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm
                                focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                         type="password"
                         name="password_confirmation"
                         required
                         autocomplete="new-password" />
            </div>

            <!-- Submit -->
            <div class="flex justify-end pt-2">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
