<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PKL Student App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-800 font-inter leading-relaxed">

    {{-- Navbar --}}
    <nav class="absolute top-0 left-0 w-full z-50 bg-transparent">
        <div class="relative max-w-7xl mx-auto px-6 py-4 flex items-center justify-center">
            <img src="{{ asset('images/logo-putih.png') }}" alt="Logo" class="h-12">
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="relative h-screen bg-cover bg-center flex items-center" style="background-image: url('{{ asset('images/landing.png') }}');">
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-transparent"></div>
        <div class="relative z-10 px-6 md:px-16 lg:px-24 w-full">
            <div class="max-w-xl text-white space-y-6">
                <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                    12-SIJA STUDENTS<br>
                    SHOW YOUR PREPARATION
                </h1>
                <p class="text-lg text-gray-200">
                    Monitor student internship status easily — for schools, teachers, and companies. One try and you're digitally ready!
                </p>
                <a href="{{ route('studentAccess') }}" class="inline-block text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">
                    Get Started
                </a>
            </div>
        </div>
    </section>

    {{-- Features --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6 space-y-12">
            <h3 class="text-3xl font-bold text-center text-gray-800 mb-10">SIJA Journey</h3>

            {{-- Card 1 --}}
            <div class="bg-white shadow-md rounded-xl overflow-hidden flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 w-full h-64 md:h-auto">
                    <img src="{{ asset('images/foto1.png') }}" alt="Exhibition Achievement" class="w-full h-full object-cover">
                </div>
                <div class="md:w-1/2 w-full p-8">
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">🏆 1st Place – Department Exhibition</h4>
                    <p class="text-gray-600">
                        Recognized as the best in the school department exhibition for our internship project.
                    </p>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="bg-white shadow-md rounded-xl overflow-hidden flex flex-col md:flex-row-reverse items-center">
                <div class="md:w-1/2 w-full h-64 md:h-auto">
                    <img src="{{ asset('images/ade.jpeg') }}" alt="LKS National" class="w-full h-full object-cover">
                </div>
                <div class="md:w-1/2 w-full p-8">
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">🥈 2nd Place – LKS Provinsi</h4>
                    <p class="text-gray-600">
                        Ade Zaidan Althaf achieved 2<sup>nd</sup> place in the Provincial LKS competition for IT Network System for Business.
                    </p>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="bg-white shadow-md rounded-xl overflow-hidden flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 w-full h-64 md:h-auto">
                    <img src="{{ asset('images/alvin.jpeg') }}" alt="Cloud Computing" class="w-full h-full object-cover">
                </div>
                <div class="md:w-1/2 w-full p-8">
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">🥉 3rd Place – LKS Provinsi</h4>
                    <p class="text-gray-600">
                        Alvinsa Isnanda achieved 3<sup>rd</sup> place in the Provincial LKS competition for Cloud Computing.
                    </p>
                </div>
            </div>

            {{-- Card 4 --}}
            <div class="bg-white shadow-md rounded-xl overflow-hidden flex flex-col md:flex-row-reverse items-center">
                <div class="md:w-1/2 w-full h-64 md:h-auto">
                    <img src="{{ asset('images/fauzan.jpeg') }}" alt="Network Admin" class="w-full h-full object-cover">
                </div>
                <div class="md:w-1/2 w-full p-8">
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">🥉 3rd Place – LKS Provinsi</h4>
                    <p class="text-gray-600">
                        Rizky Fauzan Hanif achieved 3<sup>rd</sup> place in the Provincial LKS competition for IT Network System Administration.
                    </p>
                </div>
            </div>

            {{-- Card 5 --}}
            <div class="bg-white shadow-md rounded-xl overflow-hidden flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 w-full h-64 md:h-auto">
                    <img src="{{ asset('images/aryok.jpeg') }}" alt="Cyber Security" class="w-full h-full object-cover">
                </div>
                <div class="md:w-1/2 w-full p-8">
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">🏆 1st Place – LKS Provinsi</h4>
                    <p class="text-gray-600">
                        Arya Eka Rahmat Prasetyo and Muhammad Akbar Amanullah achieved 1<sup>st</sup> place in the Provincial LKS competition for Cyber Security and qualified for the National round.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Messages Section --}}
    <section class="relative bg-cover bg-center py-24 text-white" style="background-image: url('{{ asset('images/last.jpeg') }}');">
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center space-y-6">
            <h3 class="text-4xl font-bold">Messages</h3>
            <p class="text-lg leading-relaxed">
                Wishing you a meaningful internship journey! Stay safe and keep your spirits high.
                Though we may be apart by distance and time, may our memories always remain unforgettable.
            </p>
            <p class="italic text-gray-200">— Admin</p>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-gray-100 text-gray-600 text-center py-6 text-sm">
        &copy; {{ date('Y') }} PKL Student App. All rights reserved.
    </footer>

</body>
</html>
