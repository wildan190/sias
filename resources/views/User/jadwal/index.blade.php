<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Jadwal Pelajaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Jadwal Pelajaran</h2>

                @php
                // Inisialisasi array untuk menyimpan jadwal pelajaran siswa berdasarkan hari
                $jadwalByDay = [];
                
                // Mengelompokkan jadwal pelajaran siswa berdasarkan hari
                foreach($jadwalPelajaran as $jadwal) {
                    $hari = $jadwal->hari;
                    if (!isset($jadwalByDay[$hari])) {
                        $jadwalByDay[$hari] = [];
                    }
                    $jadwalByDay[$hari][] = $jadwal;
                }
                @endphp

                @foreach($jadwalByDay as $hari => $jadwalPelajaran)
                    <div class="mb-4">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $hari }}</h3>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nama Guru
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Mata Pelajaran
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Kelas
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Waktu
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    // Sort jadwal pelajaran siswa berdasarkan waktu
                                    usort($jadwalPelajaran, function($a, $b) {
                                        return strtotime($a->waktu) - strtotime($b->waktu);
                                    });
                                    @endphp
                                    @foreach($jadwalPelajaran as $jadwal)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $jadwal->guru->name }}
                                            </td>
                                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $jadwal->mapel->nama_mapel }}
                                            </td>
                                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $jadwal->kelas->nama_kelas }}
                                            </td>
                                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $jadwal->waktu }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
