<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Siswa Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Daftar Siswa</h2>
                    <a href="{{ route('superadmin.siswas.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Data</a>
                </div>

                <form action="{{ route('superadmin.siswas.index') }}" method="GET" class="mb-4">
                    <div class="flex items-center">
                        <input type="text" name="search" class="px-2 py-1 border rounded-md mr-2" value="{{ $search }}" placeholder="Cari nama siswa...">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cari</button>
                    </div>
                </form>

                @if($search)
                <div class="mb-4">
                    <p class="text-sm text-gray-700 dark:text-gray-400">Hasil pencarian untuk: {{ $search }}</p><a href="{{ route('superadmin.siswas.index') }}" > reset</a>
                </div>
                @endif

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    NISN
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Siswa
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Lahir
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nomor Telepon
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kelas
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Prodi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Semester
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($siswas as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->nisn }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->nama_siswa }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->tanggal_lahir_siswa }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->nomor_telepon_siswa }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->kelas->nama_kelas }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->prodi->nama_prodi }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->semester->nama_semester }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if($item->status == 'aktif')
                                    <span class="inline-flex items-center bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300"><span class="w-2 h-2 me-1 bg-blue-500 rounded-full"></span>{{ $item->status }}</span>
                                    @elseif($item->status == 'lulus')
                                    <span class="inline-flex items-center bg-green-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300"><span class="w-2 h-2 me-1 bg-yellow-500 rounded-full"></span>{{ $item->status }}</span>
                                    @elseif($item->status == 'drop out')
                                    <span class="inline-flex items-center bg-gray-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-gray-900 dark:text-gray-300"><span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>{{ $item->status }}</span>
                                    @else
                                    {{ $item->status }}
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('superadmin.siswas.show', $item->id) }}" class="text-blue-600 hover:text-blue-900">Show</a>
                                    <a href="{{ route('superadmin.siswas.edit', $item->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('superadmin.siswas.destroy', $item->id) }}" method="POST" class="inline">
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
                    {{ $siswas->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>