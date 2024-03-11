<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Mata Pelajaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Left Column -->
                    <div>
                        <div class="bg-blue-500 text-white rounded-lg p-4 mb-4">
                            <h2 class="text-2xl font-semibold">{{ $mapel->nama_mapel }}</h2>
                            <p class="text-sm">{{ $mapel->kategori }} - {{ $mapel->programStudi->nama_prodi }}</p>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2 md:col-span-1">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">ID</p>
                                <p class="text-sm text-gray-900 dark:text-white">{{ $mapel->mapel_id }}</p>
                            </div>
                            <div class="col-span-2 md:col-span-1">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Guru Pengampu</p>
                                <p class="text-sm text-gray-900 dark:text-white">{{ $mapel->guruPengampu->name }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div>
                        <div class="bg-white dark:bg-gray-700 rounded-lg p-4">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Deskripsi</p>
                            <p class="text-sm text-gray-900 dark:text-white">{{ $mapel->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('superadmin.mapels.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-300 active:bg-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>