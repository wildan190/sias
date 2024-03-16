<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="relative p-6 flex-auto">
                    <!-- Form Edit Data Semester -->
                    <form method="POST" action="{{ route('superadmin.semesters.update', $semester->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Nama Semester -->
                        <div class="mb-4">
                            <label for="nama_semester" class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                                Nama Semester
                            </label>
                            <input type="text" name="nama_semester" id="nama_semester" class="mt-1 p-2 border rounded-md w-full" value="{{ $semester->nama_semester }}" required placeholder="Masukkan Nama Semester">
                        </div>

                        <!-- Deskripsi Semester -->
                        <div class="mb-4">
                            <label for="deskripsi_semester" class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                                Deskripsi Semester
                            </label>
                            <textarea name="deskripsi_semester" id="deskripsi_semester" class="mt-1 p-2 border rounded-md w-full" required placeholder="Masukkan Deskripsi Semester">{{ $semester->deskripsi_semester }}</textarea>
                        </div>

                        <!-- Tombol Submit dan Batal -->
                        <div class="flex items-center justify-between mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Simpan
                            </button>
                            <a href="{{ route('superadmin.semesters.index') }}" class="text-gray-600 dark:text-gray-300 hover:underline">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
