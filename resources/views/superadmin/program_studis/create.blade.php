<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Program Studi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('superadmin.program_studis.store') }}">
                    @csrf

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

                    <!-- Id Prodi -->
                    <div class="mb-4">
                        <label for="prodi_id" class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                            Id Prodi
                        </label>
                        <input type="text" name="prodi_id" id="prodi_id" class="mt-1 p-2 border rounded-md w-full" required placeholder="Masukkan Id Prodi">
                    </div>

                    <!-- Nama Program Studi -->
                    <div class="mb-4">
                        <label for="nama_prodi" class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                            Nama Program Studi
                        </label>
                        <input type="text" name="nama_prodi" id="nama_prodi" class="mt-1 p-2 border rounded-md w-full" required placeholder="Masukkan Nama Program Studi">
                    </div>

                    <!-- Ketua Program Studi -->
                    <div class="mb-4">
                        <label for="ketua_prodi" class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                            Ketua Program Studi
                        </label>
                        <div class="flex items-center">
                            <input type="text" id="selected_ketua_prodi" class="border p-2 rounded-md mr-2" readonly placeholder="Pilih Ketua Prodi">
                            <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" onclick="openModal()">
                                Pilih Ketua Prodi
                            </button>
                        </div>
                        <input type="hidden" name="ketua_prodi" id="ketua_prodi" />
                    </div>

                    <!-- Tombol Submit -->
                    <div class="flex items-center justify-between mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Simpan
                        </button>

                        <!-- Tombol Batal -->
                        <a href="{{ route('superadmin.program_studis.index') }}" class="text-gray-600 dark:text-gray-300 hover:underline">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Ketua Prodi -->
    <div class="fixed inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75" id="ketuaProdiModal" style="display: none;">
        <div class="relative top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-2/4 bg-white rounded shadow-lg">
            <div class="flex items-start justify-between p-5 border-b border-solid rounded-t border-blueGray-200">
                <h3 class="text-2xl font-semibold">Pilih Ketua Prodi</h3>
                <button type="button" class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="closeModal()">
                    <span class="bg-transparent text-black opacity-5 h-6 w-6 text-xl block outline-none focus:outline-none">×</span>
                </button>
            </div>
            <div class="relative p-6 flex-auto max-h-60 overflow-auto">
                <!-- Search Input -->
                <input type="text" id="searchGuru" class="mb-4 p-2 border rounded-md w-full" placeholder="Cari guru...">

                <!-- Table to display Ketua Prodi data -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Nama Guru
                                        <a href="#">
                                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Spesialis
                                        <a href="#">
                                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
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
                                    <button type="button" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="selectKetuaProdi({{ $guru->id }},'{{ $guru->name }}')">
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
            document.getElementById('ketuaProdiModal').style.display = "block";
        }

        function closeModal() {
            document.getElementById('ketuaProdiModal').style.display = "none";
        }

        function selectKetuaProdi(id, nama) {
            document.getElementById('ketua_prodi').value = id;
            document.getElementById('selected_ketua_prodi').value = nama;
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