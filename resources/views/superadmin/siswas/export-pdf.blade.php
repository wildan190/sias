<!DOCTYPE html>
<html>

<head>
    <title>Kartu ID Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .card {
            width: 300px;
            border: 2px solid #333;
            padding: 10px;
            margin: 10px;
            text-align: center;
        }

        .photo {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="card">
        <img src="{{ asset('images/' . $siswa->foto_siswa) }}" alt="Foto Siswa" class="photo">
        <h2>{{ $siswa->nama_siswa }}</h2>
        <p>NIS: {{ $siswa->nisn }}</p>
        <p>Tanggal Lahir: {{ $siswa->tanggal_lahir_siswa }}</p>
        <p>Kelas: {{ $siswa->kelas->nama_kelas }}</p>
        <!-- Tambahkan informasi lain sesuai kebutuhan -->
    </div>
</body>

</html>