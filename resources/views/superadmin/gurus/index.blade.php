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
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gurus as $guru)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <img class="w-10 h-10 rounded-full" src="{{ asset('storage/foto_guru/' . $guru->foto_guru) }}" alt="Jese image">
                                    <div class="ps-3">
                                        <div class="text-base font-semibold">{{$guru->name}}</div>
                                        <div class="font-normal text-gray-500">{{$guru->email_guru}}</div>
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $guru->tanggal_lahir_guru }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('superadmin.gurus.show', $guru->id) }}" class="inline-flex items-center justify-center px-2 py-1 border border-transparent text-sm font-small rounded-md text-blue-600 dark:text-blue-500 bg-transparent hover:bg-blue-50 dark:hover:bg-blue-800 hover:text-blue-800 dark:hover:text-blue-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm0 2a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-9a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1zm0-4a1 1 0 0 1 1 1v1a1 1 0 1 1-2 0V8a1 1 0 0 1 1-1z" clip-rule="evenodd" />
                                        </svg>
                                        Show
                                    </a>

                                    <a href="{{ route('superadmin.gurus.edit', $guru->id) }}" class="inline-flex items-center justify-center px-2 py-1 border border-transparent text-sm font-small rounded-md text-yellow-600 dark:text-yellow-500 bg-transparent hover:bg-yellow-50 dark:hover:bg-yellow-800 hover:text-yellow-800 dark:hover:text-yellow-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.707 18.707a1 1 0 0 1-1.414-1.414l8.32-8.32a1 1 0 0 1 1.414 1.414l-8.32 8.32a.997.997 0 0 1-.707.293zM18 9a1 1 0 0 1-1 1h-3.586l2.293 2.293a1 1 0 1 1-1.414 1.414L12 11.414V15a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v3.586l2.293-2.293a1 1 0 1 1 1.414 1.414L14.414 16H18a1 1 0 0 1 1 1z" clip-rule="evenodd" />
                                        </svg>
                                        Edit
                                    </a>

                                    <form action="{{ route('superadmin.gurus.destroy', $guru->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center px-2 py-1 border border-transparent text-sm font-small rounded-md text-red-600 dark:text-red-500 bg-transparent hover:bg-red-50 dark:hover:bg-red-800 hover:text-red-800 dark:hover:text-red-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M6 2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2h3a1 1 0 0 1 0 2h-.293l-.293.293A1 1 0 0 1 17 5H3a1 1 0 0 1-.707-1.707L2.293 3.5H2a1 1 0 0 1 0-2h3zM5 9a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V9zm7-2v8H8V7h4zm-3 3a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" clip-rule="evenodd" />
                                            </svg>
                                            Delete
                                        </button>
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