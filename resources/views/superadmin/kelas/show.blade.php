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
                    <!-- Informasi Kelas -->
                    <div class="mb-4">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Detail Kelas: {{ $kelas->nama_kelas }}</h2>
                        <p class="text-gray-600 dark:text-gray-400">Program Studi: {{ $kelas->prodi->nama_prodi }}</p>
                        <p class="text-gray-600 dark:text-gray-400">Wali Kelas: {{ $kelas->waliKelas->name }}</p>
                    </div>

                    <!-- Daftar Siswa -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Daftar Siswa Kelas</h3>
                        @if ($siswas->count() > 0)
                        <div class="overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th class="px-6 py-3 font-medium text-gray-900 dark:text-white">Nama Siswa</th>
                                        <th class="px-6 py-3 font-medium text-gray-900 dark:text-white">NISN</th>
                                        <th class="px-6 py-3 font-medium text-gray-900 dark:text-white">Tanggal Lahir</th>
                                        <!-- Tambahkan kolom lain sesuai kebutuhan -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswas as $siswa)
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <td class="px-6 py-4">{{ $siswa->nama_siswa }}</td>
                                        <td class="px-6 py-4">{{ $siswa->nisn }}</td>
                                        <td class="px-6 py-4">{{ $siswa->tanggal_lahir_siswa }}</td>
                                        <!-- Tambahkan kolom lain sesuai kebutuhan -->
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <p class="text-gray-600 dark:text-gray-400">Belum ada siswa yang terdaftar dalam kelas ini.</p>
                        @endif
                    </div>

                    <!-- Tombol Kembali -->
                    <div class="mt-4">
                        <a href="{{ route('superadmin.kelas.index') }}" class="bg-gray-300 dark:bg-gray-700 hover:bg-gray-400 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-bold py-2 px-4 rounded inline-flex items-center">
                            <svg class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 13H5M12 20l-7-7 7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>