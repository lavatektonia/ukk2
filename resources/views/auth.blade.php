<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PKL App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css') {{-- Tailwind CSS --}}

    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-100 via-white to-blue-50 min-h-screen flex items-center justify-center px-4">

    <div class="bg-white shadow-2xl rounded-2xl max-w-4xl w-full grid grid-cols-1 md:grid-cols-2 overflow-hidden border border-blue-100">

        <!-- Left Panel -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-10 flex flex-col justify-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-4 leading-snug">Welcome to the PKL Portal</h1>
            <p class="text-base md:text-lg mb-6 leading-relaxed">
                A simple platform to manage your internship tasks, reports, and attendance with ease.
            </p>
        </div>

        <!-- Right Panel -->
        <div class="p-10 flex flex-col justify-center bg-white">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800 text-center">Student Access</h2>

            <div class="flex flex-col space-y-4">
                <a href="{{ route('login') }}" 
                   class="w-full text-center bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-lg text-lg transition duration-200 ease-in-out">
                    Login
                </a>

                <a href="{{ route('register') }}" 
                   class="w-full text-center border border-blue-500 text-blue-600 hover:bg-blue-50 py-3 rounded-lg text-lg transition duration-200 ease-in-out">
                    Register
                </a>
            </div>

            <p class="text-xs text-gray-400 text-center mt-6">© {{ date('Y') }} PKL Student Portal. All rights reserved.</p>
        </div>
    </div>

</body>
</html>
