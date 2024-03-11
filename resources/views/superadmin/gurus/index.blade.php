<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Guru Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Daftar Guru</h2>
                    <a href="{{ route('superadmin.gurus.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Data</a>
                </div>

                <form action="{{ route('superadmin.gurus.index') }}" method="GET" class="mb-4">
                    <div class="flex items-center">
                        <input type="text" name="search" class="px-2 py-1 border rounded-md mr-2" value="{{ $search }}" placeholder="Cari nama guru...">
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
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Lahir
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gurus as $guru)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $guru->name }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $guru->tanggal_lahir_guru }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $guru->email_guru }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('superadmin.gurus.show', $guru->id) }}" class="text-blue-600 hover:text-blue-900">Show</a>
                                        <a href="{{ route('superadmin.gurus.edit', $guru->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('superadmin.gurus.destroy', $guru->id) }}" method="POST" class="inline">
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
                    {{ $gurus->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
