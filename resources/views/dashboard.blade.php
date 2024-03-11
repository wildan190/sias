<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Tampilkan konten khusus untuk super admin --}}
                @if(Auth::user()->hasRole('superadmin'))
                <div class="p-6">
                    <div class="p-6 bg-blue-200 text-blue-900">
                        {{ __("Welcome Super Admin!") }}
                    </div>
                </div>

                <div class="p-6">
                    <h2 class="font-semibold text-xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Menu') }}
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                        <!-- Management Guru Button -->
                        <a href="{{ route('superadmin.gurus.index') }}" class="bg-blue-200 p-6 rounded-lg hover:bg-blue-300 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-8 w-8 mb-4 text-blue-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a2 2 0 0 0-2-2H3a2 2 0 0 0-2 2v2"></path>
                                <path d="M17 21v-2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2"></path>
                            </svg>
                            Manajemen Guru
                        </a>

                        <!-- Management Prodi Button -->
                        <a href="{{ route('superadmin.program_studis.index') }}" class="bg-blue-200 p-6 rounded-lg hover:bg-blue-300 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-8 w-8 mb-4 text-blue-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Manajemen Program Studi
                        </a>

                        <!-- Management Mata Pelajaran Button -->
                        <a href="{{ route('superadmin.mapels.index') }}" class="bg-blue-200 p-6 rounded-lg hover:bg-blue-300 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-8 w-8 mb-4 text-blue-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Manajemen Mata Pelajaran
                        </a>

                        <!-- Management Semester -->
                        <a href="{{ route('superadmin.semesters.index') }}" class="bg-blue-200 p-6 rounded-lg hover:bg-blue-300 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-8 w-8 mb-4 text-blue-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Manajemen Semester
                        </a>

                        <!-- Management Kelas -->
                        <a href="{{ route('superadmin.kelas.index') }}" class="bg-blue-200 p-6 rounded-lg hover:bg-blue-300 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-8 w-8 mb-4 text-blue-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Manajemen Kelas
                        </a>

                        <!-- Management Kelas -->
                        <a href="{{ route('superadmin.siswas.index') }}" class="bg-blue-200 p-6 rounded-lg hover:bg-blue-300 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-8 w-8 mb-4 text-blue-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Manajemen Siswa
                        </a>
                    </div>
                </div>
                @endif

                {{-- Tampilkan konten khusus untuk admin --}}
                @if(Auth::user()->hasRole('admin'))
                <div class="p-6 bg-green-200 text-green-900">
                    {{ __("Welcome Teacher!") }}
                </div>
                @endif

                {{-- Tampilkan konten khusus untuk user --}}
                @if(Auth::user()->hasRole('user'))
                <div class="p-6 bg-yellow-200 text-yellow-900">
                    {{ __("Welcome Student!") }}
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>