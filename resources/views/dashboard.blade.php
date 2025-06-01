<x-app-layout>
    <div class="bg-gradient-to-br from-blue-100 via-white to-blue-50 min-h-screen py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome Section -->
            <div class="text-center pt-5 pb-10">
                <h2 class="text-3xl font-bold text-gray-800">
                    Welcome, 
                    <span class="bg-gradient-to-r from-blue-500 to-purple-500 text-transparent bg-clip-text">
                        {{ Auth::user()->name }}
                    </span> 👋🏻
                </h2>
                <p class="mt-2 text-gray-500 text-base max-w-xl mx-auto">
                    Use this dashboard to professionally manage data for students, teachers, industry partners, and internships.
                </p>
            </div>

            <!-- Cards Grid: 2x2 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-2 mb-12">
                <!-- Student Card -->
                <div class="bg-white border p-6 rounded-xl shadow hover:shadow-md transition">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="bg-gray-200 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Student Records</h3>
                    </div>
                    <p class="text-sm text-gray-500 leading-relaxed">View and manage all your data efficiently!</p>
                    <a href="{{ route('student') }}" class="mt-4 inline-block text-sm text-blue-500 hover:text-blue-700 transition-transform duration-200 hover:-translate-y-1">
                        Go to Students →
                    </a>
                </div>

                <!-- Teacher Card -->
                <div class="bg-white border p-6 rounded-xl shadow hover:shadow-md transition">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="bg-gray-200 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M22 10.5V6l-10-4L2 6v4.5" />
                                <path d="M6 12v5c3.33 2 8.67 2 12 0v-5" />
                                <path d="M12 22v-5" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Teacher Directory</h3>
                    </div>
                    <p class="text-sm text-gray-500 leading-relaxed">View information about your supervising teacher!</p>
                    <a href="{{ route('teacher') }}" class="mt-4 inline-block text-sm text-blue-500 hover:text-blue-700 transition-transform duration-200 hover:-translate-y-1">
                        Go to Teachers →
                    </a>
                </div>

                <!-- Industry Card -->
                <div class="bg-white border p-6 rounded-xl shadow hover:shadow-md transition">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="bg-gray-200 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M4 7h16v13H4z" />
                                <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" />
                                <path d="M4 13h16" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Industry Partners</h3>
                    </div>
                    <p class="text-sm text-gray-500 leading-relaxed">View industry information that will collaborate with you!</p>
                    <a href="{{ route('industry') }}" class="mt-4 inline-block text-sm text-blue-500 hover:text-blue-700 transition-transform duration-200 hover:-translate-y-1">
                        Go to Industries →
                    </a>
                </div>

                <!-- PKL Card -->
                <div class="bg-white border p-6 rounded-xl shadow hover:shadow-md transition">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="bg-gray-200 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2" />
                                <rect x="9" y="3" width="6" height="4" rx="1" />
                                <line x1="9" y1="12" x2="15" y2="12" />
                                <line x1="9" y1="16" x2="13" y2="16" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Internship Data (PKL)</h3>
                    </div>
                    <p class="text-sm text-gray-500 leading-relaxed">View and manage your PKL data and status!</p>
                    <a href="{{ route('pkl') }}" class="mt-4 inline-block text-sm text-blue-500 hover:text-blue-700 transition-transform duration-200 hover:-translate-y-1">
                        Go to PKL Data →
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
