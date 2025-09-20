<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid gap-6 md:grid-cols-3">
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Profil Kamu</h3>
                <p><span class="font-bold">Nama:</span> {{ Auth::user()->name }}</p>
                <p><span class="font-bold">Email:</span> {{ Auth::user()->email }}</p>
            </div>

            <div class="bg-white shadow rounded-lg p-6 text-center">
                <h3 class="text-lg font-semibold text-gray-700">Jumlah Postingan</h3>
                <p class="text-2xl font-bold text-gray-900 mt-2">12</p>
            </div>

            <div class="bg-white shadow rounded-lg p-6 text-center">
                <h3 class="text-lg font-semibold text-gray-700">Komentar</h3>
                <p class="text-2xl font-bold text-gray-900 mt-2">34</p>
            </div>
        </div>
    </div>
</x-app-layout>