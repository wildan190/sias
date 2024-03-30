<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Tampilkan konten khusus untuk super admin --}}
                @if(Auth::user()->hasRole('superadmin'))
                <div class="p-6">
                    <div class="p-6 bg-blue-200 text-blue-900">
                        {{ __("Welcome Super Admin!") }}
                    </div>
                </div>
                @endif

                {{-- Tampilkan konten khusus untuk admin --}}
                @if(Auth::user()->hasRole('admin'))
                <div class="p-6 bg-green-200 text-green-900">
                    {{ __("Welcome Teacher!") }}
                </div>
                @endif

                {{-- Tampilkan konten khusus untuk user --}}
                @if(Auth::user()->hasRole('user'))
                <div class="p-6 bg-yellow-200 text-yellow-900">
                    {{ __("Welcome Student!") }}
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>