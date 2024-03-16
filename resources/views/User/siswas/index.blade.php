<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profil Siswa') }}
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
                <!-- Card Profil Siswa -->
                <div class="bg-gray-200 dark:bg-gray-700 p-8 rounded-lg mb-8 flex items-center">
                    <!-- Foto Profil -->
                    <div class="flex-shrink-0">
                        <img src="{{ asset('images/' . $siswa->foto_siswa) }}" alt="Foto Siswa" class="h-24 w-24 rounded-full border-4 border-white dark:border-gray-800">
                    </div>

                    <!-- Informasi Profil -->
                    <div class="ml-6">
                        <h2 class="text-3xl font-semibold text-gray-800 dark:text-gray-200">{{ $siswa->nama_siswa }}</h2>
                        <p class="text-gray-500 dark:text-gray-400">{{ $siswa->kelas->nama_kelas }}</p>
                    </div>
                </div>

                <!-- Detail Profil Siswa -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">NISN</th>
                                <td class="px-6 py-4">{{ $siswa->nisn }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Nama Siswa</th>
                                <td class="px-6 py-4">{{ $siswa->nama_siswa }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Tanggal Lahir</th>
                                <td class="px-6 py-4">{{ $siswa->tanggal_lahir_siswa }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Jenis Kelamin</th>
                                <td class="px-6 py-4">{{ $siswa->gender_siswa }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Sekolah Asal</th>
                                <td class="px-6 py-4">{{ $siswa->sekolah_asal }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Angkatan</th>
                                <td class="px-6 py-4">{{ $siswa->angkatan }}</td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">Tanggal Registrasi</th>
                                <td class="px-6 py-4">{{ $siswa->tanggal_registrasi }}</td>
                            </tr>
                            <!-- Tambahkan informasi tambahan sesuai kebutuhan -->
                        </tbody>
                    </table>
                </div>

                <br />

                <!-- Tombol Kembali (reposisi ke kiri bawah) -->
                <div class="mt-auto text-left">
                    <a href="{{ route('dashboard') }}" class="bg-gray-300 dark:bg-gray-700 hover:bg-gray-400 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-bold py-2 px-4 rounded inline-flex items-center">
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