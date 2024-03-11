<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Program Studi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                        Id Prodi
                    </label>
                    <p class="mt-1 p-2 border rounded-md w-full">{{ $programStudi->prodi_id }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                        Nama Program Studi
                    </label>
                    <p class="mt-1 p-2 border rounded-md w-full">{{ $programStudi->nama_prodi }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                        Ketua Program Studi
                    </label>
                    <p class="mt-1 p-2 border rounded-md w-full">{{ $programStudi->ketuaProdi->name ?? 'Belum ditentukan' }}</p>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <!-- Tombol Kembali -->
                    <a href="{{ route('superadmin.program_studis.index') }}" class="text-gray-600 dark:text-gray-300 hover:underline">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
