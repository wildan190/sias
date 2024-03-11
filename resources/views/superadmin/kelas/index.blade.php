<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelas Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Daftar Kelas</h2>
                    <a href="javascript:void(0)" onclick="openModal('tambahDataModal')" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Tambah Data</a>

                </div>
                <form action="{{ route('superadmin.kelas.index') }}" method="GET" class="mb-4">
                    <div class="flex items-center">
                        <input type="text" name="search" class="px-2 py-1 border rounded-md mr-2" value="{{ $search }}" placeholder="Cari kelas...">
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
                                    Nama Kelas
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Wali Kelas
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kelas as $kelas)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $kelas->nama_kelas }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $kelas->waliKelas->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('superadmin.kelas.edit', $kelas->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('superadmin.kelas.destroy', $kelas->id) }}" method="POST" class="inline">
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
            </div>
        </div>
    </div>

    <!-- Tambah Data Modal -->
    <div class="fixed inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75" id="tambahDataModal" style="display: none;">
        <div class="relative top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-2/4 bg-white rounded shadow-lg">
            <div class="flex items-start justify-between p-5 border-b border-solid rounded-t border-blueGray-200">
                <h3 class="text-2xl font-semibold">Tambah Data Kelas</h3>
                <button type="button" class="p-1 ml-auto bg-transparent border-5 text-black opacity-5 text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="closeModal('tambahDataModal')">
                    <span class="bg-transparent text-black opacity-0 h-6 w-6 text-xl block outline-none focus:outline-none">×</span>
                </button>
            </div>
            <div class="relative p-6 flex-auto">
                <!-- Form Tambah Data Kelas -->
                <form method="POST" action="{{ route('superadmin.kelas.store') }}">
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

                    <!-- Nama Kelas -->
                    <div class="mb-4">
                        <label for="nama_kelas" class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                            Nama Kelas
                        </label>
                        <input type="text" name="nama_kelas" id="nama_kelas" class="mt-1 p-2 border rounded-md w-full" required placeholder="Masukkan Nama Kelas">
                    </div>

                    <!-- Prodi -->
                    <div class="mb-4">
                        <label for="prodi_id" class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                            Program Studi
                        </label>
                        <select name="prodi_id" id="prodi_id" class="mt-1 p-2 border rounded-md w-full" required>
                            @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Wali Kelas -->
                    <div class="mb-4">
                        <label for="wali_kelas_id" class="block text-sm font-medium text-gray-600 dark:text-gray-200">
                            Wali Kelas
                        </label>
                        <select name="wali_kelas_id" id="wali_kelas_id" class="mt-1 p-2 border rounded-md w-full" required>
                            @foreach($gurus as $guru)
                            <option value="{{ $guru->id }}">{{ $guru->name }}</option>
                            @endforeach
                        </select>
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

    <script>
        // untuk modal create
        function openModal(modalId) {
            document.getElementById(modalId).style.display = "block";
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }
    </script>

</x-app-layout>