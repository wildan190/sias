<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Semester Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Daftar Semester</h2>
                    <!-- Tambah Data Button -->
                    <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="openModal('tambahDataModal')">
                        Tambah Data
                    </button>

                </div>

                <form action="{{ route('superadmin.semesters.index') }}" method="GET" class="mb-4">
                    <div class="flex items-center">
                        <input type="text" name="search" class="px-2 py-1 border rounded-md mr-2" value="{{ $search }}" placeholder="Cari nama semester...">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cari</button>
                    </div>
                </form>

                @if($search)
                <div class="mb-4">
                    <p class="text-sm text-gray-700 dark:text-gray-400">Hasil pencarian untuk: {{ $search }}</p>
                </div>
                @endif

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama Semester
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Deskripsi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($semesters as $semester)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $semester->nama_semester }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $semester->deskripsi_semester }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button onclick="editModal('{{ $semester->nama_semester }}', '{{ $semester->deskripsi_semester }}')">Edit</button>
                                    <form action="{{ route('superadmin.semesters.destroy', $semester->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $semesters->links() }}
                </div>

            </div>
        </div>
    </div>

    <!-- Tambah Data Modal -->
    <div class="fixed inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75" id="tambahDataModal" style="display: none;">
        <div class="relative top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-2/4 bg-white rounded shadow-lg">
            <div class="flex items-start justify-between p-5 border-b border-solid rounded-t border-blueGray-200">
                <h3 class="text-2xl font-semibold">Tambah Data Semester</h3>
                <button type="button" class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="closeModal('tambahDataModal')">
                    <span class="bg-transparent text-black opacity-5 h-6 w-6 text-xl block outline-none focus:outline-none">×</span>
                </button>
            </div>
            <div class="relative p-6 flex-auto">
                <!-- Form Tambah Data Semester -->
                <form method="POST" action="{{ route('superadmin.semesters.store') }}">
                    @csrf

                    <!-- Nama Semester -->
                    <div class="mb-4">
                        <label for="nama_semester" class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                            Nama Semester
                        </label>
                        <input type="text" name="nama_semester" id="nama_semester" class="mt-1 p-2 border rounded-md w-full" required placeholder="Masukkan Nama Semester">
                    </div>

                    <!-- Deskripsi Semester -->
                    <div class="mb-4">
                        <label for="deskripsi_semester" class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                            Deskripsi Semester
                        </label>
                        <textarea name="deskripsi_semester" id="deskripsi_semester" class="mt-1 p-2 border rounded-md w-full" required placeholder="Masukkan Deskripsi Semester"></textarea>
                    </div>

                    <!-- Tombol Submit dan Batal -->
                    <div class="flex items-center justify-between mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Simpan
                        </button>
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" onclick="closeModal('tambahDataModal')">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="fixed inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75" id="editDataModal" style="display: none;">
        <div class="relative top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-2/4 bg-white rounded shadow-lg">
            <div class="flex items-start justify-between p-5 border-b border-solid rounded-t border-blueGray-200">
                <h3 class="text-2xl font-semibold">Edit Data Semester</h3>
                <button type="button" class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="closeModal('editDataModal')">
                    <span class="bg-transparent text-black opacity-5 h-6 w-6 text-xl block outline-none focus:outline-none">×</span>
                </button>
            </div>
            <div class="relative p-6 flex-auto">
                <!-- Form Edit Data Semester -->
                <form method="POST" action="{{ route('superadmin.semesters.update', $semester->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Nama Semester -->
                    <div class="mb-4">
                        <label for="editNamaSemester" class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                            Nama Semester
                        </label>
                        <input type="text" name="editNamaSemester" id="editNamaSemester" class="mt-1 p-2 border rounded-md w-full" required value="{{ $semester->nama_semester }}">
                    </div>

                    <!-- Deskripsi Semester -->
                    <div class="mb-4">
                        <label for="editDeskripsiSemester" class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                            Deskripsi Semester
                        </label>
                        <textarea name="editDeskripsiSemester" id="editDeskripsiSemester" class="mt-1 p-2 border rounded-md w-full" required>{{ $semester->deskripsi_semester }}</textarea>
                    </div>

                    <!-- Tombol Submit dan Batal -->
                    <div class="flex items-center justify-between mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Simpan
                        </button>
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" onclick="closeModal('editDataModal')">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        function openModal(modalId) {
            document.getElementById(modalId).style.display = "block";
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }

        function editModal(namaSemester, deskripsiSemester) {
            // Set nilai pada form edit
            document.getElementById('editNamaSemester').value = namaSemester;
            document.getElementById('editDeskripsiSemester').value = deskripsiSemester;

            // Tampilkan modal edit
            openModal('editDataModal');
        }
    </script>

</x-app-layout>