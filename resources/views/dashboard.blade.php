<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
    </x-slot>

    <!-- Greeting -->
    <div class="mb-6">
        <h2 class="text-lg text-gray-600">Selamat datang kembali, <span class="font-bold text-gray-800">{{ Auth::user()->name }}</span>! 👋</h2>
        <p class="text-sm text-gray-400 mt-1">{{ now()->translatedFormat('l, d F Y') }}</p>
    </div>

    <!-- Stat Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">

        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Total Tugas</p>
                <div class="w-9 h-9 bg-blue-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-gray-800">{{ $total }}</p>
        </div>

        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Belum</p>
                <div class="w-9 h-9 bg-red-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-red-500">{{ $belum }}</p>
        </div>

        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Sedang</p>
                <div class="w-9 h-9 bg-amber-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-amber-500">{{ $sedang }}</p>
        </div>

        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Selesai</p>
                <div class="w-9 h-9 bg-green-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-green-500">{{ $selesai }}</p>
        </div>

    </div>

    <!-- Progress Bar -->
    @if($total > 0)
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm mb-8">
        <div class="flex justify-between items-center mb-3">
            <p class="text-sm font-semibold text-gray-700">Progress Keseluruhan</p>
            <p class="text-sm font-bold text-green-600">{{ round(($selesai / $total) * 100) }}%</p>
        </div>
        <div class="w-full bg-gray-100 rounded-full h-2.5">
            <div class="bg-green-500 h-2.5 rounded-full transition-all duration-500"
                style="width: {{ ($selesai / $total) * 100 }}%"></div>
        </div>
        <p class="text-xs text-gray-400 mt-2">{{ $selesai }} dari {{ $total }} tugas selesai</p>
    </div>
    @endif

    <!-- Quick Actions -->
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
        <p class="text-sm font-semibold text-gray-700 mb-4">Aksi Cepat</p>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('tasks.index') }}"
                class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-xl text-sm font-medium transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                </svg>
                Lihat Semua Tugas
            </a>
            <a href="{{ route('tasks.create') }}"
                class="flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2.5 rounded-xl text-sm font-medium transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Tugas Baru
            </a>
        </div>
    </div>

</x-app-layout>