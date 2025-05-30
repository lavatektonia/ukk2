<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 via-white to-blue-50 min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <svg class="w-12 h-12 text-indigo-600" viewBox="0 0 24 24" fill="currentColor">
                <circle cx="12" cy="12" r="10" />
                <path d="M12 2a10 10 0 0 1 7.07 17.07L12 12V2z" class="text-white" />
            </svg>
        </div>

        <!-- Title -->
        <h2 class="text-xl font-semibold text-center text-gray-800 mb-4">
            Forgot your password?
        </h2>

        <!-- Instruction -->
        <p class="text-sm text-gray-600 mb-6 text-center leading-relaxed">
            No problem. Just let us know your email address and we’ll send you a password reset link.
        </p>

        <!-- Status Message -->
        @if (session('status'))
            <div class="mb-4 text-sm text-green-600 text-center">
                {{ session('status') }}
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-4 text-sm text-red-600">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                       class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm
                              focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400 text-sm">
            </div>

            <div>
                <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Email Password Reset Link
                </button>
            </div>
        </form>

        <!-- Back to login -->
        <p class="mt-6 text-center text-sm text-gray-600">
            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Back to login</a>
        </p>
    </div>

</body>
</html>
