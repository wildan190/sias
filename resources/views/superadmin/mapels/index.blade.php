<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Mapel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Daftar Mapel</h2>
                    <a href="{{ route('superadmin.mapels.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Data</a>
                </div>
                
                <!-- Tambahkan setelah bagian atas halaman -->
                <form action="{{ route('superadmin.mapels.index') }}" method="GET" class="mb-4">
                    <div class="flex items-center">
                        <input type="text" name="search" class="px-2 py-1 border rounded-md mr-2" value="{{ $search }}" placeholder="Cari mapel...">
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
                                    Nama Mapel
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Program Studi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kategori
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Guru Pengampu
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mapels as $mapel)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $mapel->nama_mapel }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $mapel->programStudi->nama_prodi }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $mapel->kategori }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $mapel->guruPengampu->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('superadmin.mapels.show', $mapel->id) }}" class="text-blue-600 hover:text-blue-900">Show</a>
                                    <a href="{{ route('superadmin.mapels.edit', $mapel->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('superadmin.mapels.destroy', $mapel->id) }}" method="POST" class="inline">
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
                    {{ $mapels->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
