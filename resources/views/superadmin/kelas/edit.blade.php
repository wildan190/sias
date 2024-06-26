<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Kelas Management') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="relative p-6 flex-auto">
                    <!-- Form Edit Data Kelas -->
                    <form method="POST" action="{{ route('superadmin.kelas.update', $kelas->id) }}">
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

                        <!-- Nama Kelas -->
                        <div class="mb-4">
                            <label for="nama_kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama Kelas
                            </label>
                            <input type="text" name="nama_kelas" id="nama_kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required placeholder="Masukkan Nama Kelas" value="{{ $kelas->nama_kelas }}">
                        </div>

                        <!-- Prodi -->
                        <div class="mb-4">
                            <label for="prodi_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Program Studi
                            </label>
                            <select name="prodi_id" id="prodi_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                @foreach($prodis as $prodi)
                                <option value="{{ $prodi->id }}" {{ $prodi->id == $kelas->prodi_id ? 'selected' : '' }}>{{ $prodi->nama_prodi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Wali Kelas -->
                        <div class="mb-4">
                            <label for="wali_kelas_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Wali Kelas
                            </label>
                            <select name="wali_kelas_id" id="wali_kelas_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                @foreach($gurus as $guru)
                                <option value="{{ $guru->id }}" {{ $guru->id == $kelas->wali_kelas_id ? 'selected' : '' }}>{{ $guru->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tombol Submit dan Batal -->
                        <div class="flex items-center justify-between mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Simpan
                            </button>
                            <a href="{{ route('superadmin.kelas.index') }}" class="text-gray-600 dark:text-gray-300 hover:underline">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>