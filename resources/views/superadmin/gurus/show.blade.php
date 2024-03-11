<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profil Guru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Info alert!</span> Pastikan identitas berikut adalah valid !
                    </div>
                </div>
                <!-- Card Profil Guru -->
                <div class="bg-gray-200 dark:bg-gray-700 p-8 rounded-lg mb-8 flex items-center">
                    <!-- Foto Profil -->
                    <div class="flex-shrink-0">
                        <img src="{{ asset('storage/foto_guru/' . $guru->foto_guru) }}" alt="Foto Guru" class="h-24 w-24 rounded-full border-4 border-white dark:border-gray-800">
                    </div>

                    <!-- Informasi Profil -->
                    <div class="ml-6">
                        <h2 class="text-3xl font-semibold text-gray-800 dark:text-gray-200">{{ $guru->name }}</h2>
                        <p class="text-gray-500 dark:text-gray-400">{{ $guru->spesialis }}</p>
                    </div>
                </div>

                <!-- Detail Profil Guru -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Username</th>
                                <td class="px-6 py-4">{{ $guru->username }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">NIK</th>
                                <td class="px-6 py-4">{{ $guru->nik_guru }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Tanggal Lahir</th>
                                <td class="px-6 py-4">{{ $guru->tanggal_lahir_guru }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Email</th>
                                <td class="px-6 py-4">{{ $guru->email_guru }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Telepon</th>
                                <td class="px-6 py-4">{{ $guru->nomor_telepon_guru }}</td>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Alamat</th>
                                <td class="px-6 py-4">{{ $guru->alamat_guru }}</td>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">NIP</th>
                                <td class="px-6 py-4">{{ $guru->nip_guru }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Spesialis</th>
                                <td class="px-6 py-4">{{ $guru->spesialis }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Jenis Kelamin</th>
                                <td class="px-6 py-4">{{ $guru->gender }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Agama</th>
                                <td class="px-6 py-4">{{ $guru->agama_guru }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <br />

                <!-- Tombol Kembali (reposisi ke kiri bawah) -->
                <div class="mt-auto text-left">
                    <a href="{{ route('superadmin.gurus.index') }}" class="bg-gray-300 dark:bg-gray-700 hover:bg-gray-400 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-bold py-2 px-4 rounded inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 13H5M12 20l-7-7 7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>