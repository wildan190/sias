<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Data Guru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('superadmin.gurus.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
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

                    <!-- Username -->
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Username</label>
                        <input type="text" name="username" id="username" value="{{ $guru->username }}" placeholder="Masukkan username" class="rounded-md border-gray-300 dark:border-gray-700 focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full">
                    </div>

                    <!-- NIK Guru -->
                    <div class="mb-4">
                        <label for="nik_guru" class="block text-sm font-medium text-gray-600 dark:text-gray-300">NIK Guru</label>
                        <input type="text" name="nik_guru" id="nik_guru" value="{{ $guru->nik_guru }}" placeholder="Masukkan NIK Guru" class="rounded-md border-gray-300 dark:border-gray-700 focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full">
                    </div>

                    <!-- Nama -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Nama</label>
                        <input type="text" name="name" id="name" value="{{ $guru->name }}" placeholder="Masukkan Nama Guru" class="rounded-md border-gray-300 dark:border-gray-700 focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full">
                    </div>

                    <!-- Tanggal Lahir Guru -->
                    <div class="mb-4">
                        <label for="tanggal_lahir_guru" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Tanggal Lahir Guru</label>
                        <input type="date" name="tanggal_lahir_guru" id="tanggal_lahir_guru" value="{{ $guru->tanggal_lahir_guru }}" class="rounded-md border-gray-300 dark:border-gray-700 focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full">
                    </div>

                    <!-- Email Guru -->
                    <div class="mb-4">
                        <label for="email_guru" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Email Guru</label>
                        <input type="email" name="email_guru" id="email_guru" value="{{ $guru->email_guru }}" placeholder="Masukkan Email Guru" class="rounded-md border-gray-300 dark:border-gray-700 focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full">
                    </div>

                    <!-- Nomor Telepon Guru -->
                    <div class="mb-4">
                        <label for="nomor_telepon_guru" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Nomor Telepon Guru</label>
                        <input type="tel" name="nomor_telepon_guru" id="nomor_telepon_guru" value="{{ $guru->nomor_telepon_guru }}" placeholder="Masukkan Nomor Telepon Guru" class="rounded-md border-gray-300 dark:border-gray-700 focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full">
                    </div>

                    <!-- Alamat Guru -->
                    <div class="mb-4">
                        <label for="alamat_guru" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Alamat Guru</label>
                        <textarea name="alamat_guru" id="alamat_guru" placeholder="Masukkan Alamat Guru" class="rounded-md border-gray-300 dark:border-gray-700 focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full">{{ $guru->alamat_guru }}</textarea>
                    </div>

                    <!-- NIP Guru -->
                    <div class="mb-4">
                        <label for="nip_guru" class="block text-sm font-medium text-gray-600 dark:text-gray-300">NIP Guru</label>
                        <input type="text" name="nip_guru" id="nip_guru" value="{{ $guru->nip_guru }}" placeholder="Masukkan NIP Guru" class="rounded-md border-gray-300 dark:border-gray-700 focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full">
                    </div>

                    <!-- Spesialis -->
                    <div class="mb-4">
                        <label for="spesialis" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Spesialis</label>
                        <input type="text" name="spesialis" id="spesialis" value="{{ $guru->spesialis }}" placeholder="Masukkan Spesialis Guru" class="rounded-md border-gray-300 dark:border-gray-700 focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full">
                    </div>

                    <!-- Gender Guru -->
                    <div class="mb-4">
                        <label for="gender" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Gender Guru</label>
                        <select name="gender" id="gender" class="rounded-md border-gray-300 dark:border-gray-700 focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full" required>
                            <option value="Laki-Laki" {{ $guru->gender == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="Perempuan" {{ $guru->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <!-- Agama Guru -->
                    <div class="mb-4">
                        <label for="agama_guru" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Agama Guru</label>
                        <select name="agama_guru" id="agama_guru" class="rounded-md border-gray-300 dark:border-gray-700 focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full" required>
                            <option value="Islam" {{ $guru->agama_guru == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Kristen" {{ $guru->agama_guru == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                            <option value="Katolik" {{ $guru->agama_guru == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option value="Hindu" {{ $guru->agama_guru == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Buddha" {{ $guru->agama_guru == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            <option value="Konghuchu" {{ $guru->agama_guru == 'Konghuchu' ? 'selected' : '' }}>Konghuchu</option>
                        </select>
                    </div>

                    <!-- Foto Guru -->
                    <div class="mb-4">
                        <label for="foto_guru" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Foto Guru</label>
                        <input type="file" name="foto_guru" id="foto_guru" class="rounded-md border-gray-300 dark:border-gray-700 focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full">
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
