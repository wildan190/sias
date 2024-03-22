<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Jadwal Guru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-2 gap-6">
                    <!-- Mata Pelajaran -->
                    <div class="mb-4">
                        <p class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                            Mata Pelajaran
                        </p>
                        <p class="mt-1 p-2 border rounded-md">{{ $jadwalGuru->mapel->nama_mapel }}</p>
                    </div>

                    <!-- Kelas -->
                    <div class="mb-4">
                        <p class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                            Kelas
                        </p>
                        <p class="mt-1 p-2 border rounded-md">{{ $jadwalGuru->kelas->nama_kelas }}</p>
                    </div>

                    <!-- Hari -->
                    <div class="mb-4">
                        <p class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                            Hari
                        </p>
                        <p class="mt-1 p-2 border rounded-md">{{ $jadwalGuru->hari }}</p>
                    </div>

                    <!-- Waktu -->
                    <div class="mb-4">
                        <p class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                            Waktu
                        </p>
                        <p class="mt-1 p-2 border rounded-md">{{ $jadwalGuru->waktu }}</p>
                    </div>

                    <!-- Guru Pengampu -->
                    <div class="mb-4">
                        <p class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                            Guru Pengampu
                        </p>
                        <p class="mt-1 p-2 border rounded-md">{{ $jadwalGuru->guru->name }}</p>
                    </div>
                </div>

                <!-- Tombol Kembali -->
                <div class="mt-4">
                    <a href="{{ route('superadmin.jadwal_gurus.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
