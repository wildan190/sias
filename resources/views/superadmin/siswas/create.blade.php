<!-- resources/views/superadmin/siswas/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form id="createSiswaForm" method="POST" action="{{ route('superadmin.siswas.store') }}" enctype="multipart/form-data">
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

                    <!-- Langkah 1: Informasi Siswa -->
                    <div class="step" id="step1">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Form Identitas Siswa</h2>

                        <p class="mb-3 text-gray-500 dark:text-gray-400">Track work across the enterprise through an open, collaborative platform. Link issues across Jira and ingest data from other software development tools, so your IT support and operations teams have richer contextual information to rapidly respond to requests, incidents, and changes.</p>
                        <p class="mb-3 text-gray-500 dark:text-gray-400">Deliver great service experiences fast - without the complexity of traditional ITSM solutions.Accelerate critical development work, eliminate toil, and deploy changes with ease, with a complete audit trail for every change.</p>

                        <div class="grid gap-6 mb-6 md:grid-cols-3">
                            <div class="mb-4">
                                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Username Siswa
                                </label>
                                <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Masukkan Username Siswa">
                            </div>
                            <!-- NISSN -->
                            <div class="mb-4">
                                <label for="nisn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    NISN
                                </label>
                                <input type="text" name="nisn" id="nisn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Masukkan NISSN">
                            </div>
                            <!-- NIK Siswa -->
                            <div class="mb-4">
                                <label for="nik_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    NIK Siswa
                                </label>
                                <input type="text" name="nik_siswa" id="nik_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Masukkan NIK Siswa">
                            </div>
                        </div>
                        <!-- Nama Siswa -->
                        <div class="mb-4">
                            <label for="nama_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama Siswa
                            </label>
                            <input type="text" name="nama_siswa" id="nama_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Masukkan Nama Siswa">
                        </div>

                        <div class="grid gap-6 mb-6 md:grid-cols-3">
                            <!-- Tanggal Lahir Siswa -->
                            <div class="mb-4">
                                <label for="tanggal_lahir_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Tanggal Lahir Siswa
                                </label>
                                <input type="date" name="tanggal_lahir_siswa" id="tanggal_lahir_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div>
                            <!-- Gender Siswa -->
                            <div class="mb-4">
                                <label for="gender_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Gender Siswa
                                </label>
                                <select name="gender_siswa" id="gender_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="Laki-laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <!-- Agama Siswa -->
                            <div class="mb-4">
                                <label for="agama_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Agama Siswa
                                </label>
                                <select name="agama_siswa" id="agama_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="ISLAM">Islam</option>
                                    <option value="KRISTEN">Kristen</option>
                                    <option value="KATOLIK">Katolik</option>
                                    <option value="HINDU">Hindu</option>
                                    <option value="BUDHA">Budha</option>
                                    <option value="KONGHUCHU">Konghuchu</option>
                                </select>
                            </div>
                            <!-- Golongan Darah -->
                            <div class="mb-4">
                                <label for="golongan_darah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Golongan Darah
                                </label>
                                <input type="text" name="golongan_darah" id="golongan_darah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Golongan Darah">
                            </div>

                            <!-- Kewarganegaraan -->
                            <div class="mb-4">
                                <label for="kewarganegaraan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Kewarganegaraan
                                </label>
                                <select name="kewarganegaraan" id="kewarganegaraan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="" selected disabled>Pilih Kewarganegaraan</option>
                                    <option value="WNI">Warga Negara Indonesia (WNI)</option>
                                    <option value="WNA">Warga Negara Asing (WNA)</option>
                                </select>
                            </div>
                            <!-- Hobi -->
                            <div class="mb-4">
                                <label for="hobi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Hobi
                                </label>
                                <input type="text" name="hobi" id="hobi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Hobi">
                            </div>
                        </div>

                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <!-- Nomor Telepon Siswa -->
                            <div class="mb-4">
                                <label for="nomor_telepon_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Nomor Telepon Siswa
                                </label>
                                <input type="text" name="nomor_telepon_siswa" id="nomor_telepon_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Masukkan Nomor Telepon Siswa">
                            </div>

                            <!-- Email Siswa -->
                            <div class="mb-4">
                                <label for="email_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Email Siswa
                                </label>
                                <input type="email" name="email_siswa" id="email_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Email Siswa">
                            </div>
                        </div>
                        <!-- Foto Siswa -->
                        <div class="mb-4">
                            <label for="foto_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Foto Siswa
                            </label>
                            <input type="file" name="foto_siswa" id="foto_siswa" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        </div>
                        <button type="button" onclick="nextStep(2)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Selanjutnya
                        </button>
                    </div>

                    <!-- Langkah 2: Detail Lainnya -->
                    <div class="step" id="step2" style="display: none;">

                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Form Program Studi</h2>
                        <p class="mb-3 text-gray-500 dark:text-gray-400">Track work across the enterprise through an open, collaborative platform. Link issues across Jira and ingest data from other software development tools, so your IT support and operations teams have richer contextual information to rapidly respond to requests, incidents, and changes.</p>

                        <div class="grid gap-6 mb-6 md:grid-cols-3">

                            <!-- Prodi -->
                            <div class="mb-4">
                                <label for="prodi_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Program Studi
                                </label>
                                <select name="prodi_id" id="prodi_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="" selected disabled>Pilih Program Studi</option>
                                    @foreach($prodis as $prodi)
                                    <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
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
                                    <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }} - {{ $kelasItem->prodi->nama_prodi }}</option>
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
                                    <option value="{{ $semester->id }}">{{ $semester->nama_semester }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Status
                                </label>
                                <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="aktif">Aktif</option>
                                    <option value="lulus">Lulus</option>
                                    <option value="drop out">Drop Out</option>
                                </select>
                            </div>

                            <!-- Angkatan -->
                            <div class="mb-4">
                                <label for="angkatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Angkatan
                                </label>
                                <input type="text" name="angkatan" id="angkatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Angkatan">
                            </div>

                            <!-- Tanggal Registrasi -->
                            <div class="mb-4">
                                <label for="tanggal_registrasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Tanggal Registrasi
                                </label>
                                <input type="date" name="tanggal_registrasi" id="tanggal_registrasi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div>
                        </div>
                        <!-- Sekolah Asal -->
                        <div class="mb-4">
                            <label for="sekolah_asal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Sekolah Asal
                            </label>
                            <input type="text" name="sekolah_asal" id="sekolah_asal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Sekolah Asal">
                        </div>
                        <!-- Siswa Transfer -->
                        <div class="mb-4">
                            <label for="siswa_transfer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Apakah Siswa baru atau Transfer ?
                            </label>
                            <select name="siswa_transfer" id="siswa_transfer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="" selected disabled>Pilih</option>
                                <option value="pindahan">Transfer</option>
                                <option value="bukan pindahan">Baru</option>
                            </select>
                        </div>

                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Form Wali Siswa</h2>
                        <p class="mb-3 text-gray-500 dark:text-gray-400">Deliver great service experiences fast - without the complexity of traditional ITSM solutions.Accelerate critical development work, eliminate toil, and deploy changes with ease, with a complete audit trail for every change.</p>

                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <!-- Nama Wali Siswa -->
                            <div class="mb-4">
                                <label for="nama_wali_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Nama Wali Siswa
                                </label>
                                <input type="text" name="nama_wali_siswa" id="nama_wali_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama Wali Siswa">
                            </div>

                            <!-- Pekerjaan Wali Siswa -->
                            <div class="mb-4">
                                <label for="pekerjaan_wali_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Pekerjaan Wali Siswa
                                </label>
                                <input type="text" name="pekerjaan_wali_siswa" id="pekerjaan_wali_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Pekerjaan Wali Siswa" required>
                            </div>
                        </div>

                        <!-- Pendapatan Wali Siswa -->
                        <div class="mb-4">
                            <label for="pendapatan_wali_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Pendapatan Wali Siswa
                            </label>
                            <select name="pendapatan_wali_siswa" id="pendapatan_wali_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="" selected disabled>Pilih Pendapatan Wali Siswa</option>
                                <option value="1000000">(Kurang dari) < Rp. 3.000.000</option>
                                <option value="3000000">Rp. 3.000.000 > (Lebih dari)</option>
                                <option value="5000000">Rp. 5.000.000 > (Lebih dari)</option>
                                <option value="10000000">Rp. 10.000.000 > (Lebih dari)</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>

                        <div class="grid gap-6 mb-6 md:grid-cols-2">

                            <!-- Nomor Telepon Wali -->
                            <div class="mb-4">
                                <label for="nomor_telepon_wali" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Nomor Telepon Wali
                                </label>
                                <input type="text" name="nomor_telepon_wali" id="nomor_telepon_wali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nomor Telepon Wali">
                            </div>

                            <!-- Email Wali -->
                            <div class="mb-4">
                                <label for="email_wali" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Email Wali
                                </label>
                                <input type="email" name="email_wali" id="email_wali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Email Wali">
                            </div>

                        </div>

                        <!-- Alamat Wali Siswa -->
                        <div class="mb-4">
                            <label for="alamat_wali_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" required>
                                Alamat Wali Siswa
                            </label>
                            <textarea name="alamat_wali_siswa" id="alamat_wali_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Alamat Wali Siswa" required></textarea>
                        </div>

                        <!-- Kode Pos -->
                        <div class="mb-4">
                            <label for="kode_pos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Kode Pos
                            </label>
                            <input type="text" name="kode_pos" id="kode_pos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Kode Pos">
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="flex items-center justify-between mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Simpan
                        </button>
                        <!-- Tombol Sebelumnya -->
                        <button type="button" onclick="nextStep(1)" class="text-gray-600 dark:text-gray-300 hover:underline">Sebelumnya</button>
                        <!-- Tombol Batal -->
                        <a href="{{ route('superadmin.siswas.index') }}" class="text-gray-600 dark:text-gray-300 hover:underline">Batal</a>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>

    <script>
        function nextStep(step) {
            document.getElementById('step1').style.display = step === 1 ? 'block' : 'none';
            document.getElementById('step2').style.display = step === 2 ? 'block' : 'none';
        }
    </script>
</x-app-layout>