<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome Section -->
            <div class="mb-12 bg-white p-8 rounded-2xl shadow text-center">
                <h2 class="text-3xl font-bold text-gray-800">Welcome, {{ Auth::user()->name }} 👋</h2>
                <p class="mt-2 text-gray-500 text-base">
                    Use this dashboard to professionally manage data for students, teachers, industry partners, and internships.
                </p>
            </div>

            <!-- Top 3 Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Student -->
                <div class="bg-white border p-6 rounded-xl shadow hover:shadow-md transition">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="bg-blue-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Student Records</h3>
                    </div>
                    <p class="text-sm text-gray-600">View and manage all your data efficiently!</p>
                    <a href="{{ route('student') }}" class="mt-4 inline-block text-sm text-blue-600 hover:underline">Go to Students →</a>
                </div>

                <!-- Teacher -->
                <div class="bg-white border p-6 rounded-xl shadow hover:shadow-md transition">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="bg-green-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Teacher Directory</h3>
                    </div>
                    <p class="text-sm text-gray-600">View information about your supervising teacher!</p>
                    <a href="{{ route('teacher') }}" class="mt-4 inline-block text-sm text-green-600 hover:underline">Go to Teachers →</a>
                </div>

                <!-- Industry -->
                <div class="bg-white border p-6 rounded-xl shadow hover:shadow-md transition">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="bg-yellow-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Industry Partners</h3>
                    </div>
                    <p class="text-sm text-gray-600">View industry information that will collaborate with you!</p>
                    <a href="{{ route('industry') }}" class="mt-4 inline-block text-sm text-yellow-600 hover:underline">Go to Industries →</a>
                </div>

            </div>

            <!-- PKL Card (Bottom Centered) -->
            <div class="mt-10 flex justify-center">
                <div class="w-full md:w-1/2">
                    <div class="bg-white border p-6 rounded-xl shadow hover:shadow-md transition text-center">
                        <div class="flex justify-center mb-3">
                            <div class="bg-purple-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Internship Data (PKL)</h3>
                        <p class="mt-2 text-sm text-gray-600">View and manage your PKL data and status!</p>
                        <a href="{{ route('pkl') }}" class="mt-4 inline-block text-sm text-purple-600 hover:underline">Go to Internship →</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
