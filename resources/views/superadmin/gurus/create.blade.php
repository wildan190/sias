<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Data Guru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Daftar Guru</h2>
                </div>
                <form action="{{ route('superadmin.gurus.store') }}" method="POST" enctype="multipart/form-data">
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

                    <!-- Username -->
                    <div class="mb-4">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" name="username" id="username" placeholder="Masukkan username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <!-- NIK Guru -->
                    <div class="mb-4">
                        <label for="nik_guru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK Guru</label>
                        <input type="text" name="nik_guru" id="nik_guru" placeholder="Masukkan NIK Guru" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <!-- Nama -->
                    <div class="mb-4">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="name" id="name" placeholder="Masukkan Nama Guru" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <!-- Tanggal Lahir Guru -->
                    <div class="mb-4">
                        <label for="tanggal_lahir_guru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir Guru</label>
                        <input type="date" name="tanggal_lahir_guru" id="tanggal_lahir_guru" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <!-- Email Guru -->
                    <div class="mb-4">
                        <label for="email_guru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Guru</label>
                        <input type="email" name="email_guru" id="email_guru" placeholder="Masukkan Email Guru" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <!-- Nomor Telepon Guru -->
                    <div class="mb-4">
                        <label for="nomor_telepon_guru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon Guru</label>
                        <input type="tel" name="nomor_telepon_guru" id="nomor_telepon_guru" placeholder="Masukkan Nomor Telepon Guru" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <!-- Alamat Guru -->
                    <div class="mb-4">
                        <label for="alamat_guru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Guru</label>
                        <textarea name="alamat_guru" id="alamat_guru" placeholder="Masukkan Alamat Guru" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                    </div>

                    <!-- NIP Guru -->
                    <div class="mb-4">
                        <label for="nip_guru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP Guru</label>
                        <input type="text" name="nip_guru" id="nip_guru" placeholder="Masukkan NIP Guru" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <!-- Spesialis -->
                    <div class="mb-4">
                        <label for="spesialis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Spesialis</label>
                        <input type="text" name="spesialis" id="spesialis" placeholder="Masukkan Spesialis Guru" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <!-- Gender Guru -->
                    <div class="mb-4">
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender Guru</label>
                        <select name="gender" id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <!-- Agama Guru -->
                    <div class="mb-4">
                        <label for="agama_guru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama Guru</label>
                        <select name="agama_guru" id="agama_guru" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghuchu">Konghuchu</option>
                        </select>
                    </div>

                    <!-- Foto Guru -->
                    <div class="mb-4">
                        <label for="foto_guru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Guru</label>
                        <input type="file" name="foto_guru" id="foto_guru" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    </div>

                    <!-- Tombol Submit -->
                    <div class="flex items-center justify-between mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Simpan
                        </button>

                        <!-- Tombol Batal -->
                        <a href="{{ route('superadmin.gurus.index') }}" class="text-gray-600 dark:text-gray-300 hover:underline">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>