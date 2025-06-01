<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - PKL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 via-white to-blue-50 min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SIJA" class="w-24 h-auto">
        </div>

        <!-- Title -->
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">
            Create your account!
        </h2>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-4">
                <div class="text-sm text-red-600">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Full Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                       class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm 
                              focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400 text-sm">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required
                       class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm 
                              focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400 text-sm">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required
                       class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm 
                              focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400 text-sm">
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                       class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm 
                              focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400 text-sm">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md text-sm font-medium transition duration-200">
                    Register
                </button>
            </div>
        </form>

        <!-- Already Registered -->
        <p class="mt-6 text-center text-sm text-gray-600">
            Already registered?
            <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:underline">Sign in</a>
        </p>
    </div>

</body>
</html>
