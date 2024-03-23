<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Jadwal Guru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('superadmin.jadwal_gurus.update', $jadwalGuru->id) }}">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                    <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
                        Terdapat beberapa kesalahan dalam pengisian formulir:
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="grid gap-6 mb-6 md:grid-cols-2">

                        <!-- Mata Pelajaran -->
                        <div class="mb-4">
                            <label for="mata_pelajaran_id" class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                                Mata Pelajaran
                            </label>
                            <select name="mata_pelajaran_id" id="mata_pelajaran_id" class="mt-1 p-2 border rounded-md w-full" required>
                                <option value="" disabled>Pilih Mata Pelajaran</option>
                                @foreach($mapels as $mapel)
                                <option value="{{ $mapel->id }}" {{ $jadwalGuru->mata_pelajaran_id == $mapel->id ? 'selected' : '' }}>{{ $mapel->nama_mapel }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Kelas -->
                        <div class="mb-4">
                            <label for="kelas_id" class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                                Kelas
                            </label>
                            <select name="kelas_id" id="kelas_id" class="mt-1 p-2 border rounded-md w-full" required>
                                @foreach ($kelas as $kelas)
                                <option value="{{ $kelas->id }}" {{ $jadwalGuru->kelas_id == $kelas->id ? 'selected' : '' }}>{{ $kelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Hari -->
                        <div class="mb-4">
                            <label for="hari" class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                                Hari
                            </label>
                            <input type="date" name="hari" id="hari" class="mt-1 p-2 border rounded-md w-full" required value="{{ $jadwalGuru->hari }}">
                        </div>

                        <!-- Waktu -->
                        <div class="mb-4">
                            <label for="waktu" class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                                Waktu
                            </label>
                            <input type="time" name="waktu" id="waktu" class="mt-1 p-2 border rounded-md w-full" required value="{{ $jadwalGuru->waktu }}">
                        </div>

                        <!-- Guru Pengampu -->
                        <div class="mb-4">
                            <label for="guru_pengampu" class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                                Guru Pengampu
                            </label>
                            <div class="flex items-center">
                                <input type="text" id="selected_guru_pengampu" class="border p-2 rounded-md mr-2" readonly placeholder="Pilih Guru Pengampu" value="{{ $jadwalGuru->guru->name }}">
                                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="openModal()">
                                    Pilih Guru Pengampu
                                </button>
                            </div>
                            <input type="hidden" name="guru_id" id="guru_pengampu" required value="{{ $jadwalGuru->guru_id }}" />
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="flex items-center justify-between mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Simpan
                        </button>

                        <!-- Tombol Batal -->
                        <a href="{{ route('superadmin.jadwal_gurus.index') }}" class="text-gray-600 dark:text-gray-300 hover:underline">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Guru Pengampu -->
    <div class="fixed inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75" id="guruPengampuModal" style="display: none;">
        <div class="relative top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-2/4 bg-white rounded shadow-lg">
            <div class="
            <div class=" flex items-start justify-between p-5 border-b border-solid rounded-t border-blueGray-200">
                <h3 class="text-2xl font-semibold">Pilih Guru Pengampu</h3>
                <button type="button" class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="closeModal()">
                    <span class="bg-transparent text-black opacity-5 h-6 w-6 text-xl block outline-none focus:outline-none">×</span>
                </button>
            </div>
            <div class="relative p-6 flex-auto max-h-60 overflow-auto">
                <!-- Search Input -->
                <input type="text" id="searchGuru" class="mb-4 p-2 border rounded-md w-full" placeholder="Cari guru...">

                <!-- Table to display Guru Pengampu data -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Nama Guru
                                        <a href="#">
                                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087a1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985a2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Spesialis
                                        <a href="#">
                                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087a1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985a2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody id="guruTable">
                            @foreach($gurus as $guru)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $guru->name }}</td>
                                <td class="px-6 py-4">{{ $guru->spesialis }}</td>
                                <td class="px-6 py-4">
                                    <button type="button" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="selectGuruPengampu({{ $guru->id }},'{{ $guru->name }}')">
                                        <i class="fas fa-check-circle"></i> Pilih
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex items-center justify-end p-6 border-t border-solid rounded-b border-blueGray-200">
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md focus:outline-none focus:shadow-outline-gray active:bg-gray-800" onclick="closeModal()">Tutup</button>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('guruPengampuModal').style.display = "block";
        }

        function closeModal() {
            document.getElementById('guruPengampuModal').style.display = "none";
        }

        function selectGuruPengampu(id, nama) {
            document.getElementById('guru_pengampu').value = id;
            document.getElementById('selected_guru_pengampu').value = nama;
            closeModal();
        }

        // Fungsi pencarian
        document.getElementById('searchGuru').addEventListener('input', function() {
            let searchValue = this.value.toLowerCase();
            let guruTable = document.getElementById('guruTable');
            let rows = guruTable.getElementsByTagName('tr');

            for (let row of rows) {
                let cells = row.getElementsByTagName('td');
                let found = false;

                for (let cell of cells) {
                    if (cell.innerHTML.toLowerCase().includes(searchValue)) {
                        found = true;
                        break;
                    }
                }

                row.style.display = found ? '' : 'none';
            }
        });
    </script>
</x-app-layout>