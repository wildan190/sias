<!-- resources/views/superadmin/siswas/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('superadmin.siswas.update', $siswa->id) }}" enctype="multipart/form-data">
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

                    <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <!-- Username Siswa -->
                        <div class="mb-4">
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Username Siswa
                            </label>
                            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Masukkan Username Siswa" value="{{ old('username', $siswa->username) }}">
                        </div>
                        <!-- NISSN -->
                        <div class="mb-4">
                            <label for="nisn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                NISN
                            </label>
                            <input type="text" name="nisn" id="nisn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Masukkan NISSN" value="{{ old('nisn', $siswa->nisn) }}">
                        </div>
                        <!-- NIK Siswa -->
                        <div class="mb-4">
                            <label for="nik_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                NIK Siswa
                            </label>
                            <input type="text" name="nik_siswa" id="nik_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Masukkan NIK Siswa" value="{{ old('nik_siswa', $siswa->nik_siswa) }}">
                        </div>
                        <!-- Nama Siswa -->
                        <div class="mb-4">
                            <label for="nama_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama Siswa
                            </label>
                            <input type="text" name="nama_siswa" id="nama_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Masukkan Nama Siswa" value="{{ old('nama_siswa', $siswa->nama_siswa) }}">
                        </div>
                        <!-- Tanggal Lahir Siswa -->
                        <div class="mb-4">
                            <label for="tanggal_lahir_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tanggal Lahir Siswa
                            </label>
                            <input type="date" name="tanggal_lahir_siswa" id="tanggal_lahir_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ old('tanggal_lahir_siswa', $siswa->tanggal_lahir_siswa) }}">
                        </div>

                        <!-- Gender Siswa -->
                        <div class="mb-4">
                            <label for="gender_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Gender Siswa
                            </label>
                            <select name="gender_siswa" id="gender_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="Laki-laki" @if(old('gender_siswa', $siswa->gender_siswa) == 'Laki-Laki') selected @endif>Laki-Laki</option>
                                <option value="Perempuan" @if(old('gender_siswa', $siswa->gender_siswa) == 'Perempuan') selected @endif>Perempuan</option>
                            </select>
                        </div>

                        <!-- Agama Siswa -->
                        <div class="mb-4">
                            <label for="agama_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Agama Siswa
                            </label>
                            <select name="agama_siswa" id="agama_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="ISLAM" @if(old('agama_siswa', $siswa->agama_siswa) == 'Islam') selected @endif>Islam</option>
                                <option value="KRISTEN" @if(old('agama_siswa', $siswa->agama_siswa) == 'Kristen') selected @endif>Kristen</option>
                                <option value="KATOLIK" @if(old('agama_siswa', $siswa->agama_siswa) == 'Katolik') selected @endif>Katolik</option>
                                <option value="HINDU" @if(old('agama_siswa', $siswa->agama_siswa) == 'Hindu') selected @endif>Hindu</option>
                                <option value="BUDHA" @if(old('agama_siswa', $siswa->agama_siswa) == 'Budha') selected @endif>Budha</option>
                                <option value="KONGHUCU" @if(old('agama_siswa', $siswa->agama_siswa) == 'Konghuchu') selected @endif>Konghuchu</option>
                            </select>
                        </div>

                        <!-- Golongan Darah -->
                        <div class="mb-4">
                            <label for="golongan_darah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Golongan Darah
                            </label>
                            <input type="text" name="golongan_darah" id="golongan_darah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Golongan Darah" value="{{ old('golongan_darah', $siswa->golongan_darah) }}">
                        </div>

                        <!-- Kewarganegaraan -->
                        <div class="mb-4">
                            <label for="kewarganegaraan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Kewarganegaraan
                            </label>
                            <select name="kewarganegaraan" id="kewarganegaraan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="WNI" @if(old('kewarganegaraan', $siswa->kewarganegaraan) == 'WNI') selected @endif>Warga Negara Indonesia (WNI)</option>
                                <option value="WNA" @if(old('kewarganegaraan', $siswa->kewarganegaraan) == 'WNA') selected @endif>Warga Negara Asing (WNA)</option>
                            </select>
                        </div>

                        <!-- Hobi -->
                        <div class="mb-4">
                            <label for="hobi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Hobi
                            </label>
                            <input type="text" name="hobi" id="hobi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Hobi" value="{{ old('hobi', $siswa->hobi) }}">
                        </div>

                        <!-- Nomor Telepon Siswa -->
                        <div class="mb-4">
                            <label for="nomor_telepon_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nomor Telepon Siswa
                            </label>
                            <input type="text" name="nomor_telepon_siswa" id="nomor_telepon_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Masukkan Nomor Telepon Siswa" value="{{ old('nomor_telepon_siswa', $siswa->nomor_telepon_siswa) }}">
                        </div>

                        <!-- Email Siswa -->
                        <div class="mb-4">
                            <label for="email_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Email Siswa
                            </label>
                            <input type="email" name="email_siswa" id="email_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Email Siswa" value="{{ old('email_siswa', $siswa->email_siswa) }}">
                        </div>

                        <!-- Prodi -->
                        <div class="mb-4">
                            <label for="prodi_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Program Studi
                            </label>
                            <select name="prodi_id" id="prodi_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="" selected disabled>Pilih Program Studi</option>
                                @foreach($prodis as $prodi)
                                <option value="{{ $prodi->id }}" @if(old('prodi_id', $siswa->prodi_id) == $prodi->id) selected @endif>{{ $prodi->nama_prodi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Kelas -->
                        <div class="mb-4">
                            <label for="kelas_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Kelas
                            </label>
                            <select name="kelas_id" id="kelas_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="" selected disabled>Pilih Kelas</option>
                                @foreach($kelas as $kelasItem)
                                <option value="{{ $kelasItem->id }}" @if(old('kelas_id', $siswa->kelas_id) == $kelasItem->id) selected @endif>{{ $kelasItem->nama_kelas }} - {{ $kelasItem->prodi->nama_prodi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Semester -->
                        <div class="mb-4">
                            <label for="semester_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Semester
                            </label>
                            <select name="semester_id" id="semester_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="" selected disabled>Pilih Semester</option>
                                @foreach($semesters as $semester)
                                <option value="{{ $semester->id }}" @if(old('semester_id', $siswa->semester_id) == $semester->id) selected @endif>{{ $semester->nama_semester }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Status
                        </label>
                        <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="aktif" @if(old('status', $siswa->status) == 'aktif') selected @endif>Aktif</option>
                            <option value="lulus" @if(old('status', $siswa->status) == 'lulus') selected @endif>Lulus</option>
                            <option value="drop out" @if(old('status', $siswa->status) == 'drop out') selected @endif>Drop Out</option>
                        </select>
                    </div>

                    <!-- Foto Siswa -->
                    <div class="mb-4">
                        <label for="foto_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Foto Siswa
                        </label>
                        <input type="file" name="foto_siswa" id="foto_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <!-- Sekolah Asal -->
                    <div class="mb-4">
                        <label for="sekolah_asal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Sekolah Asal
                        </label>
                        <input type="text" name="sekolah_asal" id="sekolah_asal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Sekolah Asal" value="{{ old('sekolah_asal', $siswa->sekolah_asal) }}">
                    </div>

                    <!-- Angkatan -->
                    <div class="mb-4">
                        <label for="angkatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Angkatan
                        </label>
                        <input type="text" name="angkatan" id="angkatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Angkatan" value="{{ old('angkatan', $siswa->angkatan) }}">
                    </div>

                    <!-- Tanggal Registrasi -->
                    <div class="mb-4">
                        <label for="tanggal_registrasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tanggal Registrasi
                        </label>
                        <input type="date" name="tanggal_registrasi" id="tanggal_registrasi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ old('tanggal_registrasi', $siswa->tanggal_registrasi) }}">
                    </div>

                    <!-- Siswa Transfer -->
                    <div class="mb-4">
                        <label for="siswa_transfer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Apakah Siswa baru atau Transfer ?
                        </label>
                        <select name="siswa_transfer" id="siswa_transfer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="" selected disabled>Pilih</option>
                            <option value="pindahan" @if(old('siswa_transfer', $siswa->siswa_transfer) == 'pindahan') selected @endif>Transfer</option>
                            <option value="bukan pindahan" @if(old('siswa_transfer', $siswa->siswa_transfer) == 'bukan pindahan') selected @endif>Baru</option>
                        </select>
                    </div>

                    <!-- Nama Wali Siswa -->
                    <div class="mb-4">
                        <label for="nama_wali_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama Wali Siswa
                        </label>
                        <input type="text" name="nama_wali_siswa" id="nama_wali_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama Wali Siswa" value="{{ old('nama_wali_siswa', $siswa->nama_wali_siswa) }}">
                    </div>

                    <!-- Pekerjaan Wali Siswa -->
                    <div class="mb-4">
                        <label for="pekerjaan_wali_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Pekerjaan Wali Siswa
                        </label>
                        <input type="text" name="pekerjaan_wali_siswa" id="pekerjaan_wali_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Pekerjaan Wali Siswa" required value="{{ old('pekerjaan_wali_siswa', $siswa->pekerjaan_wali_siswa) }}">
                    </div>

                    <!-- Pendapatan Wali Siswa -->
                    <div class="mb-4">
                        <label for="pendapatan_wali_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Pendapatan Wali Siswa
                        </label>
                        <select name="pendapatan_wali_siswa" id="pendapatan_wali_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="" selected disabled>Pilih Pendapatan Wali Siswa</option>
                            <option value="1000000" @if(old('pendapatan_wali_siswa', $siswa->pendapatan_wali_siswa) == '1000000') selected @endif>(Kurang dari) < Rp. 3.000.000</option>
                            <option value="3000000" @if(old('pendapatan_wali_siswa', $siswa->pendapatan_wali_siswa) == '3000000') selected @endif>Rp. 3.000.000 > (Lebih dari)</option>
                            <option value="5000000" @if(old('pendapatan_wali_siswa', $siswa->pendapatan_wali_siswa) == '5000000') selected @endif>Rp. 5.000.000 > (Lebih dari)</option>
                            <option value="10000000" @if(old('pendapatan_wali_siswa', $siswa->pendapatan_wali_siswa) == '10000000') selected @endif>Rp. 10.000.000 > (Lebih dari)</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>

                    <!-- Nomor Telepon Wali -->
                    <div class="mb-4">
                        <label for="nomor_telepon_wali" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nomor Telepon Wali
                        </label>
                        <input type="text" name="nomor_telepon_wali" id="nomor_telepon_wali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nomor Telepon Wali" value="{{ old('nomor_telepon_wali', $siswa->nomor_telepon_wali) }}">
                    </div>

                    <!-- Alamat Siswa -->
                    <div class="mb-4">
                        <label for="alamat_wali_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Alamat Siswa
                        </label>
                        <textarea name="alamat_wali_siswa" id="alamat_wali_siswa" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Alamat Siswa">{{ old('alamat_wali_siswa', $siswa->alamat_wali_siswa) }}</textarea>
                    </div>

                    <!-- Kode Pos -->
                    <div class="mb-4">
                        <label for="kode_pos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Kode Pos
                        </label>
                        <input type="text" name="kode_pos" id="kode_pos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Kode Pos" value="{{ old('kode_pos', $siswa->kode_pos) }}">
                    </div>

                    <!-- Tombol Submit -->
                    <div class="flex items-center justify-between mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Simpan
                        </button>

                        <!-- Tombol Batal -->
                        <a href="{{ route('superadmin.siswas.index') }}" class="text-gray-600 dark:text-gray-300 hover:underline">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>